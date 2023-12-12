<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teste extends Model
{
    protected $fillable = [
        'nome_completo', 'cpf', 'telefone', 'email', 'cep', 'rua', 'bairro', 'numero', 'cidade', 'uf',
    ];

}
