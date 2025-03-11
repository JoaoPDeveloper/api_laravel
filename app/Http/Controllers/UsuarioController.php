<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email'
        ]);

        $usuario = Usuario::create($validated);

        return response()->json([
            'message' => 'Usuário criado com sucesso',
            'data' => $usuario
        ], 201);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function show($id)
{
    $usuario = Usuario::find($id);

    if(!$usuario) {
        return response()->json([
            'message' => 'Usuário não encontrado'
        ], 404);
    }

    return response()->json([
        'data' => $usuario
    ]);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
