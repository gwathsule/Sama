<?php

namespace App\Http\Models\Pedidos;

use App\Http\Models\Doadores\Doacao;
use App\Http\Models\Produtos\Produto;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'dataPrecisao', 'status', 'caminho_foto'
    ];

    public function getStatusAttribute($value)
    {
        if ($value == 1) return 'Em Aberto';
        if ($value == 3) return 'Fechado';
        return 'Indefinido';
    }

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function doacoes(){
        return $this->hasMany(Doacao::class);
    }
}
