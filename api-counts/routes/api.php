<?php

use App\Http\Controllers\AccountsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AccountsController::class)->group( function() {
    Route::get('/conta', 'index')->name('account.index');
    Route::get('/conta/{id}', 'show')->name('account.show');
    Route::post('/conta', 'store')->name('account.store');
    Route::put('/conta/{id}', 'update')->name('account.update');
    Route::delete('/conta/{id}', 'destroy')->name('account.destroy');
});
