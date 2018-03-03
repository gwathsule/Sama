<?php

use App\Http\Models\Users\User;
use App\Http\Models\Users\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name', 'Admin')->first();

        if (isset($user->id)) {
            $user->password = bcrypt('admin');
            $user->email = 'admin@sama.com.br';
            $user->save();
            echo "\nAdmin resetado!\n";
        } else {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@sama.com.br',
                'password' => bcrypt('admin'),
                'tipo' => 6,
            ]);
            echo "\nADMIN criado!\n";
        }

        $roleAdmin = Role::where('name', 'adm')->first();

        if ($user->roles()->count() == 0 && isset($roleAdmin->id))
            $user->roles()->attach($roleAdmin->id);
    }
}
