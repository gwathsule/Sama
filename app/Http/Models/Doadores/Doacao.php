<?php

namespace App\Http\Models\Doadores;

use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
    protected $fillable = [
        'dataEntrega', 'dataDisponivel', 'status'
    ];
}
