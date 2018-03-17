<?php

namespace App\Http\Models\Rotaries;

use App\Http\Models\Users\User;


class Rotary extends User
{
    protected $fillable = [
        'cpf',
    ];
    
}
