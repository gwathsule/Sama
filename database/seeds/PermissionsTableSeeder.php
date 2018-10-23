<?php

use App\Http\Models\Users\Permission;
use App\Http\Models\Users\Role;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*O SEEDER DAS 'ROLES' deve rodar sempre antes desse, conferir sequência em DatabaseSeeder!*/

        $admin = Permission::where('name', 'adm')->first();
        $doador = Permission::where('name', 'doador')->first();
        $entidade = Permission::where('name', 'entidade')->first();
        $mediador = Permission::where('name', 'mediador')->first();

        if (!isset($admin->id)) {
            $admin = Permission::create([
                'name' => 'adm',
                'label' => 'Permissões de administrador.'
            ]);
            echo "\nPermissão 'adm' criada.\n";
        }

        if (!isset($doador->id)) {
            $doador = Permission::create([
                'name' => 'doador',
                'label' => 'Permissões de doador.'
            ]);
            echo "Permissão 'doador' criada.\n";
        }
        if (!isset($entidade->id)) {
            $entidade = Permission::create([
                'name' => 'entidade',
                'label' => 'Permissões de entidade'
            ]);
            echo "Permissão 'entidade' criada.\n";
        }

        if (!isset($mediador->id)) {
            $mediador = Permission::create([
                'name' => 'mediador',
                'label' => 'Permissões de usuário mediador'
            ]);
            echo "Permissão 'mediador' criada.\n";
        }

        //Relaciona com Roles
        $roleAdmin = Role::where('name', 'adm')->first();
        $roleDoador = Role::where('name', 'doador')->first();
        $roleEntidade = Role::where('name', 'entidade')->first();
        $roleMediador = Role::where('name', 'mediador')->first();

        if($admin->roles()->count() == 0)
            $admin->roles()->attach($roleAdmin->id);

        if($doador->roles()->count() == 0)
            $doador->roles()->attach($roleDoador->id);

        if($entidade->roles()->count() == 0)
            $entidade->roles()->attach($roleEntidade->id);

        if($mediador->roles()->count() == 0)
            $mediador->roles()->attach($roleMediador->id);
    }
}
