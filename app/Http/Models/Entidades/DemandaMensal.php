<?php

namespace App\Http\Models\Entidades;

use App\Http\Models\Produtos\Produto;
use Illuminate\Database\Eloquent\Model;

class DemandaMensal extends Model
{
    protected $fillable = [
        'observacao',
    ];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}
