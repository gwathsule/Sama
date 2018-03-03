<?php

use App\Http\Models\Users\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'adm')->first();
        $doador = Role::where('name', 'doador')->first();
        $entidade = Role::where('name', 'entidade')->first();
        $rotary = Role::where('name', 'rotary')->first();

        if (!isset($admin->id)) {
            Role::create([
                'name' => 'adm',
                'label' => 'Administrador do Sistema'
            ]);
            echo "\nFunção 'adm' criada.\n";
        }
        if (!isset($doador->id)) {
            Role::create([
                'name' => 'doador',
                'label' => 'Doador'
            ]);
            echo "Função 'doador' criada.\n";
        }
        if (!isset($entidade->id)) {
            Role::create([
                'name' => 'entidade',
                'label' => 'Entidade'
            ]);
            echo "Função 'entidade' criada.\n";
        }
        if (!isset($rotary->id)) {
            Role::create([
                'name' => 'rotary',
                'label' => 'Rotary     '
            ]);
            echo "Função 'rotary' criada.\n";
        }
    }
}
