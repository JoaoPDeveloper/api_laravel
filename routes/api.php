<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TarefaController;

// Rotas da API
Route::prefix('usuarios')->group(function () {
    Route::post('/', [UsuarioController::class, 'store']);
    Route::get('/{id}', [UsuarioController::class, 'show']);
    Route::get('/{id}/tarefas', [TarefaController::class, 'tarefasPorUsuario']);
});

Route::prefix('tarefas')->group(function () {
    Route::post('/', [TarefaController::class, 'store']);
    Route::put('/{id}', [TarefaController::class, 'update']);
});
