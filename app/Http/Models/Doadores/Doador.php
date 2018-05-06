<?php

namespace App\Http\Models\Doadores;

use Illuminate\Database\Eloquent\Model;

class Doador extends Model
{
    protected $fillable = [
        'name', 'email', 'user_id', 'tipo', 'contato', 'cpf', 'cnpj', 'telefone', 'celular', 'logo_arquivo'
    ];

    public function doacoes(){
        return $this->hasMany(Doacao::class);
    }

    public function getTipoAttribute($value)
    {
        if ($value == 1)
            return 'Fisica';
        if ($value == 2)
            return 'Juridica';
        return 'Indefinido';
    }
}
