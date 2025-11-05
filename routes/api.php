<?php

use App\Http\Controllers\Api\V1\JogadoresController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function (){
    // rota para trazer todos os jogadores
    Route::get('/jogadores', [JogadoresController::class, 'index']);
    // rota para passar o id e trazer o jogador especifico
    Route::get('/jogadores/{jogador}', [JogadoresController::class, 'show']);
    // rota para adicionar jogadores
    Route::post('/jogadores', [JogadoresController::class, 'store'])->middleware('auth:sanctum');
    //rota para atualizar jogadores
    Route::put('/jogadores/{jogador}', [JogadoresController::class, 'update'])->middleware('auth:sanctum');
    // rota para deletar jogadores
    Route::delete('/jogadores/{jogador}', [JogadoresController::class, 'destroy'])->middleware('auth:sanctum');

    // rota para criar token
    Route::post('/login', [AuthController::class, 'login']);
    // rota para remover token
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    
    // rota para criar usuario
    Route::post('/user', [UserController::class, "store"]);
});

