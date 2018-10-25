<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 17/03/2018
 * Time: 20:32
 */

namespace App\Http\Models\Mediador;

use DB;
use Validator;
use Exception;
use App\Http\Models\Users\Role;
use App\Http\Models\Users\User;
use Illuminate\Http\Request;

class mediadorRepository
{

    /**
     * mediadorRepository constructor.
     */
    public function __construct()
    {
    }

    public function validarNovo(Request $request){
        return
            $validator = Validator::make($request->all(), [
                'nome_grupo' => 'required|max:255',
                'email' => 'required|unique:users|max:255',
                'cpf' => 'unique:mediadors|max:11|min:11',
                'cnpj' => 'unique:mediadors|max:14|min:14',
                'celular' => 'required|max:11|min:11',
                'telefone' => 'max:10|min:10',
                'password' => 'required|max:60|confirmed',
                'nome_responsavel' => 'required|max:255',
                'quantidade_membros' => 'required|integer',
            ]);
    }

    public function validarEdicao($info_editadas){
        return
            $validator = Validator::make($info_editadas, [
                'nome_grupo' => 'sometimes|max:255',
                'email' => 'sometimes|unique:users|max:255',
                'cpf' => 'sometimes|unique:mediadors|max:11|min:11',
                'cnpj' => 'sometimes|unique:mediadors|max:14|min:14',
                'celular' => 'sometimes|max:11|min:11',
                'telefone' => 'sometimes|max:10|min:10',
                'password' => 'sometimes|required|max:60|confirmed',
                'nome_responsavel' => 'sometimes|max:255',
                'quantidade_membros' => 'sometimes|max:255',

            ]);
    }

    public function novo(Request $request){
        DB::connection('mysql')->beginTransaction();
        try {
            $novo_user = User::create([
                'name' => $request->nome_grupo,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'tipo' => 3,
            ]);

            $this->setRole($novo_user);

            $novo_mediador = mediador::create([
                'nome_grupo' => $request->nome_grupo,
                'nome_responsavel' => $request->nome_responsavel,
                'cpf' => $request->cpf,
                'cnpj' => $request->cnpj,
                'celular' => $request->celular,
                'telefone' => $request->telefone,
                'quantidade_membros' => $request->quantidade_membros,
                'user_id' => $novo_user->id,
                'email' => $request->email,
                'situacao' => 2
            ]);
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar novo usuário mediador: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public function editar($nova_info, $idUsuario){

        DB::connection('mysql')->beginTransaction();
        try {
            $user_mediador = mediador::query()->find($idUsuario);
            $user = User::query()->find($user_mediador->user_id);

            if(isset($nova_info['nome_grupo'])){
                $user_mediador->nome_grupo = $nova_info['nome_grupo'];
                $user->name = $nova_info['nome_grupo'];
            }

            if(isset($nova_info['email'])){
                $user_mediador->email = $nova_info['email'];
                $user->email = $nova_info['email'];
            }

            if(isset($nova_info['password']))
                $user->password = bcrypt($nova_info['password']);

            if(isset($nova_info['cpf']))
                $user_mediador->cpf = $nova_info['cpf'];

            if(isset($nova_info['cnpj']))
                $user_mediador->cnpj = $nova_info['cnpj'];

            if(isset($nova_info['celular']))
                $user_mediador->celular = $nova_info['celular'];

            if(isset($nova_info['telefone']))
                $user_mediador->telefone = $nova_info['telefone'];

            if(isset($nova_info['nome_responsavel']))
                $user_mediador->nome_responsavel = $nova_info['nome_responsavel'];

            if(isset($nova_info['quantidade_membros']))
                $user_mediador->quantidade_membros = $nova_info['quantidade_membros'];

            $user->update();
            $user_mediador->update();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar novo usuário mediador: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public function listar(){
        try{
            return mediador::all();
        } catch (Exception $e){
            throw new Exception('Erro ao listar usuários: ' . $e->getMessage());
        }
    }

    public function getById($idUsuario){
        try{
            return mediador::query()->find($idUsuario);
        } catch (Exception $e){
            throw new Exception('Erro ao recuperar usuário do banco: ' . $e->getMessage());
        }
    }

    public function excluir($idUsuario){
        DB::connection('mysql')->beginTransaction();
        try {
            $user_mediador = mediador::query()->find($idUsuario);
            $user = User::query()->find($user_mediador->user_id);
            $user_mediador->delete();
            $user->delete();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao excluir usuário: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    private function setRole(User $user)
    {
        $rolemediador = Role::where('name', 'mediador')->first();
        $user->roles()->attach($rolemediador->id);
    }
}