<?php

namespace App\Http\Models\Entidades;

use App\Http\Models\Pedidos\Pedido;
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

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}
