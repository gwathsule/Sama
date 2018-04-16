<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 17/03/2018
 * Time: 20:32
 */

namespace App\Http\Models\Rotaries;

use DB;
use Validator;
use Exception;
use App\Http\Models\Users\Role;
use App\Http\Models\Users\User;
use Illuminate\Http\Request;

class RotaryRepository
{

    /**
     * RotaryRepository constructor.
     */
    public function __construct()
    {
    }

    public function validarNovo(Request $request){
        return
            $validator = Validator::make($request->all(), [
                'nome' => 'required|max:255',
                'email' => 'required|unique:users|max:255',
                'cpf' => 'required|unique:rotaries|max:11|min:11',
                'celular' => 'required|max:11|min:10',
                'password' => 'required|max:60|confirmed',
            ]);
    }

    public function validarEdicao($info_editadas){
        return
            $validator = Validator::make($info_editadas, [
                'nome' => 'sometimes|max:255',
                'email' => 'sometimes|unique:users|max:255',
                'cpf' => 'sometimes|unique:rotaries|max:11|min:11',
                'celular' => 'sometimes|max:11|min:10',
                'password' => 'sometimes|max:60|confirmed',
            ]);
    }

    public function novo(Request $request){
        DB::connection('mysql')->beginTransaction();
        try {
            $novo_user = User::create([
                'name' => $request->nome,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'tipo' => 3,
            ]);

            $this->setRole($novo_user);

            $novo_rotary = Rotary::create([
                'celular' => $request->celular,
                'cpf' => $request->cpf,
                'user_id' => $novo_user->id,
                'name' => $request->nome,
                'email' => $request->email
            ]);
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar novo usuário Rotary: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public function editar($nova_info, $idUsuario){
        DB::connection('mysql')->beginTransaction();
        try {
            $user_rotary = Rotary::query()->find($idUsuario);
            $user = User::query()->find($user_rotary->user_id);

            if(isset($nova_info['nome'])){
                $user_rotary->name = $nova_info['nome'];
                $user->name = $nova_info['nome'];
            }

            if(isset($nova_info['email'])){
                $user_rotary->email = $nova_info['email'];
                $user->email = $nova_info['email'];
            }

            if(isset($nova_info['password']))
                $user->password = bcrypt($nova_info['password']);

            if(isset($nova_info['cpf']))
                $user_rotary->name = $nova_info['cpf'];

            if(isset($nova_info['celular']))
                $user_rotary->name = $nova_info['celular'];

            $user->update();
            $user_rotary->update();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar novo usuário Rotary: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public function listar(){
        try{
            return Rotary::all();
        } catch (Exception $e){
            throw new Exception('Erro ao listar usuários: ' . $e->getMessage());
        }
    }

    public function getById($idUsuario){
        try{
            return Rotary::query()->find($idUsuario);
        } catch (Exception $e){
            throw new Exception('Erro ao recuperar usuário do banco: ' . $e->getMessage());
        }
    }

    public function excluir($idUsuario){
        DB::connection('mysql')->beginTransaction();
        try {
            $user_rotary = Rotary::query()->find($idUsuario);
            $user = User::query()->find($user_rotary->user_id);
            $user_rotary->delete();
            $user->delete();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao excluir usuário: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    private function setRole(User $user)
    {
        $roleRotary = Role::where('name', 'rotary')->first();
        $user->roles()->attach($roleRotary->id);
    }
}