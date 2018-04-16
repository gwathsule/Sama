<?php

namespace App\Http\Models\Entidades;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    protected $fillable = [
        'name', 'email', 'user_id', 'cnpj', 'presidente', 'finalidade', 'contato', 'telefone', 'celular'
    ];

    public function demandaMensal()
    {
        return $this->hasOne(DemandaMensal::class);
    }
}
