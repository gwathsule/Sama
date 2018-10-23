<?php

namespace App\Http\Middleware;

use Closure;

class VerificaFuncao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userRoles = auth()->user()->roles;
        $rolesPermitidas = ['adm', 'doador', 'entidade', 'mediador'];

        foreach ($userRoles as $role) {
            if (in_array($role->name, $rolesPermitidas)) {
                return $next($request);
            }
        }
        abort(401, 'Usuário sem função vínculada!');
    }
}
