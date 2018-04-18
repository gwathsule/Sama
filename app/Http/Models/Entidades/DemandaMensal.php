<?php

namespace App\Http\Models\Entidades;

use App\Http\Models\Pedidos\Pedido;
use Illuminate\Database\Eloquent\Model;

class DemandaMensal extends Model
{
    protected $fillable = [
        'observacao',
    ];

    public function pedido(){
        return $this->hasOne(Pedido::class);
    }
}
