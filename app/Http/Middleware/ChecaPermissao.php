<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/03/2018
 * Time: 19:32
 */

namespace App\Http\Middleware;

use Auth;
use Gate;
use Closure;

class ChecaPermissao
{
    /**
     * Checa a permissão do usuário
     * @param $request
     * @param Closure $next
     * @param $permissao
     * @return mixed
     */
    public function handle($request, Closure $next, $permissao)
    {
        if (Auth::check()) {
            $userRoles = auth()->user()->roles;
            if (Gate::denies($permissao)) {
                foreach ($userRoles as $role) {
                    if ($role->permissions()->count() > 0) {
                        return redirect()->back();
                    }
                }
                abort(401, 'Usuário não prmitido.');
            }
        }
        else
            return redirect('/login');

        return $next($request);
    }
}