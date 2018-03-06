<?php

namespace App\Providers;

use App\Http\Models\Users\User;
use App\Http\Models\Users\Permission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        /**
        * Verifica se é uma chamada do Artisan. Isto é necessário, pois no caso da tabela de Permissions não existir,
        * será apresentado erro na linha de comando.
        */
        $requestScript = app('request')->server->get('SCRIPT_NAME');
        if ( stripos($requestScript, 'artisan') === false ) {

            $permissions = Permission::with('roles')->get();
            foreach ($permissions as $permission) {
                $gate->define($permission->name, function (User $user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }

            $gate->before(function (User $user, $ability) {
                if ($user->hasAnyRoles('adm'))
                    return true;
            });
        }
        // else echo 'Nenhuma permissão registrada!';
    }
}
