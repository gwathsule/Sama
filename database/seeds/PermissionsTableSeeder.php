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
        $rotary = Permission::where('name', 'rotary')->first();

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

        if (!isset($rotary->id)) {
            $rotary = Permission::create([
                'name' => 'rotary',
                'label' => 'Permissões de usuário rotary'
            ]);
            echo "Permissão 'rotary' criada.\n";
        }

        //Relaciona com Roles
        $roleAdmin = Role::where('name', 'adm')->first();
        $roleDoador = Role::where('name', 'doador')->first();
        $roleEntidade = Role::where('name', 'entidade')->first();
        $roleRotary = Role::where('name', 'rotary')->first();

        if($admin->roles()->count() == 0)
            $admin->roles()->attach($roleAdmin->id);

        if($doador->roles()->count() == 0)
            $doador->roles()->attach($roleDoador->id);

        if($entidade->roles()->count() == 0)
            $entidade->roles()->attach($roleEntidade->id);

        if($rotary->roles()->count() == 0)
            $rotary->roles()->attach($roleRotary->id);
    }
}
