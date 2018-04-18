<?php

namespace App\Http\Models\Doadores;

use Illuminate\Database\Eloquent\Model;

class Doador extends Model
{
    protected $fillable = [
        'name', 'email', 'user_id', 'tipo', 'cpf', 'cnpj', 'telefone', 'celular', 'caminho_logo'
    ];

    public function doacoes(){
        return $this->hasMany(Doacao::class);
    }
}
