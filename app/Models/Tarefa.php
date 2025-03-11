<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['titulo', 'descricao', 'status', 'user_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'user_id'); // Adicione o segundo parâmetro
    }
}
