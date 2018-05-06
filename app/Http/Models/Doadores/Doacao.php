<?php

namespace App\Http\Models\Doadores;

use App\Http\Models\Entidades\Entidade;
use App\Http\Models\Pedidos\Pedido;
use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    protected $fillable = [
        'dataEntrega', 'dataDisponivel', 'status', 'qtd_item'
    ];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }

    public function pedido(){
        return $this->hasOne(Pedido::class);
    }

    public function entidade(){
        return $this->hasOne(Entidade::class);
    }
}
