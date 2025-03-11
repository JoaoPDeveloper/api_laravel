<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Usuario;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function tarefasPorUsuario($userId)
    {
        $usuario = Usuario::with('tarefas')->find($userId);

        if(!$usuario) {
            return response()->json([
                'message' => 'Usuário não encontrado'
            ], 404);
        }

        return response()->json([
            'usuario' => $usuario->nome,
            'total_tarefas' => $usuario->tarefas->count(),
            'tarefas' => $usuario->tarefas
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'user_id' => 'required|exists:usuarios,id'
        ]);

        $tarefa = Tarefa::create($validated);

        return response()->json([
            'message' => 'Tarefa criada com sucesso',
            'data' => $tarefa
        ], 201);
    }

    public function update(Request $request, $id)
{
    $tarefa = Tarefa::find($id);

    if(!$tarefa) {
        return response()->json([
            'message' => 'Tarefa não encontrada'
        ], 404);
    }

    $validated = $request->validate([
        'status' => 'required|in:pendente,concluida'
    ]);

    $tarefa->update($validated);

    return response()->json([
        'message' => 'Status atualizado com sucesso',
        'data' => $tarefa
    ]);
}

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
