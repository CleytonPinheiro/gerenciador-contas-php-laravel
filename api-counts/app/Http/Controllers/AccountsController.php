<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index() {
        try {
            $count =  Accounts::all();

            if($count) {
                return response()->json($count);
            }

        } catch (\Throwable $th) {

            return response()->json(['Error ao carregar os clientes:' => $th], 422);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => ['required', 'max:255'],
                'start_account' => ['required'],
                'holder_id' => ['required']
            ]);

            $account = new Accounts();
            // return dd($request->input('credit'));
            if(($request->input('credit')))
                {
                    if(($request->input('credit')))
                    {
                        $account->credit = $request->input('credit');
                    } else {
                        $account->debit = $request->input('debit');
                    };
                } else {
                    return response()->json([
                        'ERRO: ' => 'Obrigatório debitar ou creditar na conta.'], 201
                );
            };

            // return $request->input('name');
            $countCreated = $account->create($request->input())->save();

            if($countCreated) {
                return response()->json([
                    'Sucesso' => 'Conta cadastrado com sucesso.',
                    'Detalhes: ' => $countCreated ], 201);
            } else {
                return response()->json([
                    'Erro:' => 'Conta não foi cadastrado'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao cadastrar a conta",
                'Detalhes' => $th
            ], 422);
        }
    }

    public function show($id)
    {
        return Accounts::all();
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($idCount) {
        try {
            $count = Accounts::destroy($idCount);

            if($count) {
                return response()->json(['Deletado' => 'Conta deletada com sucesso']);
            } else {
                return response()->json(['Erro:' => 'Cliente não encontrado para deletá-lo']);
            }
        } catch (\Throwable $th) {

            return response()->json(['Erro ao deletar a conta:' => $th]);
        }
    }
}
