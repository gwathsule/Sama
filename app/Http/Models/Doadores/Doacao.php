<?php

namespace App\Http\Models\Doadores;

use App\Http\Models\Entidades\Entidade;
use App\Http\Models\Pedidos\Pedido;
use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    protected $fillable = [
        'dataEntrega', 'dataDisponivel', 'status', 'qtd_item', 'pedido_id', 'entidade_id', 'doador_id'
    ];

    public function getStatusAttribute($value)
    {
        if ($value == 1) return 'Em Aprovacação';
        if ($value == 2) return 'Aprovado para busca';
        if ($value == 3) return 'Em Estoque';
        if ($value == 4) return 'Entregue / doado';
        return 'Indefinido';
    }

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
