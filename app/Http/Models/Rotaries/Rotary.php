<?php

namespace App\Http\Models\Rotaries;

use Illuminate\Database\Eloquent\Model;


class Rotary extends Model
{
    protected $fillable = [
        'name', 'email', 'cpf', 'celular', 'user_id'
    ];
    
}
