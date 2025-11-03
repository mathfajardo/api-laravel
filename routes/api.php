<?php

use App\Http\Controllers\Api\V1\JogadoresController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function (){
    Route::get('/jogadores', [JogadoresController::class, 'index']);
    Route::get('/jogadores/{jogador}', [JogadoresController::class, 'show']);
    Route::post('/jogadores', [JogadoresController::class, 'store'])->middleware('auth:sanctum');
    Route::put('/jogadores/{jogador}', [JogadoresController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('/jogadores/{jogador}', [JogadoresController::class, 'destroy'])->middleware('auth:sanctum');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/teste', [TesteController::class, 'index'])->middleware('auth:sanctum');
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
