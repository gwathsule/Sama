<?php

namespace App\Http\Models\Enderecos;

use App\Http\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['cep', 'logradouro', 'numeroEndereco', 'bairro', 'cidade',  'uf', 'pais', 'nome'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
