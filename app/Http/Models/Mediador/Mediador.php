<?php

namespace App\Http\Models\Mediador;

use Illuminate\Database\Eloquent\Model;


class Mediador extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'cpf', 'cnpj', 'celular', 'telefone', 'nome_grupo', 'nome_responsavel',
        'quantidade_membros', 'situacao'
    ];

    public function getSituacaoAttribute($value)
    {
        if ($value == 1)
            return 'Cadastro solicitado';
        if ($value == 2)
            return 'Cadastro aprovado';

        return 'Indefinido';
    }
}
