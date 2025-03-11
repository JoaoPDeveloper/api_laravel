<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class DashboardController extends Controller
{
public function index()
{
    $usuarios = Usuario::with('tarefas')->get();
    return view('dashboard', compact('usuarios'));
}
}
