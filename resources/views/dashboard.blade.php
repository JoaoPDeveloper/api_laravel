@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Painel Administrativo</h1>

    @if($usuarios->isEmpty())
        <div class="alert alert-warning">Nenhum usuário encontrado!</div>
    @else
        <div class="row">
            @foreach($usuarios as $usuario)
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between">
                        <span>{{ $usuario->nome }}</span>
                        <small>{{ $usuario->email }}</small>
                    </div>

                    <div class="card-body">
                        @if($usuario->tarefas->isEmpty())
                            <div class="text-muted">Nenhuma tarefa encontrada</div>
                        @else
                            @foreach($usuario->tarefas as $tarefa)
                            <div class="mb-3 p-3 border rounded bg-light">
                                <h5 class="d-flex justify-content-between">
                                    {{ $tarefa->titulo }}
                                    <span class="badge bg-{{ $tarefa->status == 'pendente' ? 'warning' : 'success' }}">
                                        {{ ucfirst($tarefa->status) }}
                                    </span>
                                </h5>
                                <p class="text-muted">{{ $tarefa->descricao }}</p>

                                <form action="{{ url("/api/tarefas/{$tarefa->id}") }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pendente" {{ $tarefa->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                                        <option value="concluida" {{ $tarefa->status == 'concluida' ? 'selected' : '' }}>Concluída</option>
                                    </select>
                                </form>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
