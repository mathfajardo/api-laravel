<?php

use App\Http\Controllers\Api\V1\JogadoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function (){
    Route::get('/jogadores', [JogadoresController::class, 'index']);
    Route::get('/jogadores/{jogador}', [JogadoresController::class, 'show']);
    Route::post('/jogadores', [JogadoresController::class, 'store']);
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
