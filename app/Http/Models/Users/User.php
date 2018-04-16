<?php

namespace App\Http\Models\Users;

use App\Http\Models\Enderecos\Endereco;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getTipoAttribute($value)
    {
        if ($value == 1)
            return 'Doador';
        if ($value == 2)
            return 'Entidade';
        if ($value == 3)
            return 'Rotary';
        if ($value == 6)
            return 'Admin';
        return 'Indefinido';
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }

    /*Roles<>Permissions*/
    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        if (is_array($roles) || is_object($roles)) {
            return !! $roles->intersect($this->roles)->count();
        }

        return $this->roles->contains('name', $roles);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
