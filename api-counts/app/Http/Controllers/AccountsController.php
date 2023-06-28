<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $account =  Accounts::all();

            if(count($account) > 0)
            {
                return response()->json($account);
            } else {
                return response()->json(['Error: ' => 'Nenhuma conta cadastrada']);
            }
        } catch (\Throwable $th) {
            return response()->json(['Erro ao carregar as contas:' => $th], 422);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => ['required', 'max:255'],
                'start_account' => ['required'],
                'holder_id' => ['required']
            ]);

            $account = new Accounts();

            if($validatedData)
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

            $countCreated = $account->create($request->input())->save();

            if($countCreated)
            {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $count = Accounts::where('id', $id)->first();

            if(isset($count->id)) {
                return response()->json(['data' => $count]);
            } else {
                return response()->json([
                    'Erro' => true,
                    'Message:' => "Conta não existe."
                ]);
            };
        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => "Erro ao buscar a conta.",
                'Detalhes' => $th
            ], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => ['required', 'max:255'],
                'start_account' => ['required'],
                'holder_id' => ['required'],
                'credit' => '',
                'debit' => ''
            ]);

            if($validatedData) {
                Accounts::whereId($id)->update($validatedData);

                return response()->json([
                    'Message:' => "Conta {$id} atualizada com sucesso."
                ]);
            } else {
                return response()->json([
                    'Erro' => true,
                    'Message:' => "Conta não existe."
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'Erro:' => true,
                'Message: ' => 'Erro ao atualizar a conta número: {$id}.',
                'Detalhes' => $th
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCount)
    {
        try {
            $count = Accounts::destroy($idCount);

            if($count) {
                return response()->json([
                    'Erro :' => false,
                    'Message :' => 'Conta deletada com sucesso'
                ]);
            } else {
                return response()->json([
                    'Erro :' =>  true,
                    'Message :' => 'Conta inexistente.'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'Erro :' => true,
                'Message :' => $th
            ]);
        }
    }
}
