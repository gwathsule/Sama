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
        if ($value == 1) return 'Aguardando aprovação';
        if ($value == 2) return 'Não aprovado';
        if ($value == 3) return 'Aprovado';
        return 'Indefinido';
    }

    public function produto()
    {
        return $this->hasOne(Produto::class);
    }
}
