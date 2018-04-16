<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 03/04/2018
 * Time: 22:44
 */

namespace App\Http\Models\Entidades;

use DB;
use Validator;
use Exception;
use App\Http\Models\Users\Role;
use App\Http\Models\Users\User;
use Illuminate\Http\Request;

class EntidadeRepository
{

    /**
     * EntidadeRepository constructor.
     */
    public function __construct()
    {
    }

    public function validarNovo(Request $request){
        return
            Validator::make($request->all(), [
                'nome' => 'required|max:255',
                'email' => 'required|unique:users|max:60',
                'cnpj' => 'required|unique:entidades|max:14',
                'presidente' => 'required',
                'finalidade' => 'required|max:2000',
                'contato' => 'required',
                'telefone' => 'max:10|min:10',
                'celular' => 'required|max:11|min:10',
                'cep' => 'required|max:8',
                'bairro' => 'required|max:255',
                'cidade' => 'required|max:255',
                'uf' => 'required|max:2',
                'pais' => 'required|max:255',
                'numero' => 'required|numeric',
                'logradouro' => 'required|max:255',
                'password' => 'required|max:60|confirmed',
            ]);
    }

    public function validarEdicao($info_editadas){
        return
            $validator = Validator::make($info_editadas, [
                'nome' => 'sometimes|max:255',
                'email' => 'sometimes|unique:users|max:60',
                'cnpj' => 'sometimes|unique:entidades|max:14',
                'presidente' => 'sometimes',
                'finalidade' => 'sometimes|max:2000',
                'contato' => 'sometimes',
                'telefone' => 'max:10|min:10',
                'celular' => 'sometimes|max:11|min:10',
                'cep' => 'sometimes|max:8',
                'bairro' => 'sometimes|max:255',
                'cidade' => 'sometimes|max:255',
                'uf' => 'sometimes|max:2',
                'pais' => 'sometimes|max:255',
                'numero' => 'sometimes|numeric',
                'logradouro' => 'sometimes|max:255',
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
                'tipo' => 2,
            ]);

            $this->setRole($novo_user);

            $novo_user->enderecos()->create([
                'cep' => $request->cep,
                'logradouro' => $request->logradouro,
                'numero' => $request->numero,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'pais' => $request->pais,
                'nome' => 'Endereço Principal'
            ]);

            $nova_entidade = Entidade::create([
                'name' => $request->nome,
                'email' => $request->email,
                'user_id' => $novo_user->id,
                'cnpj' => $request->cnpj,
                'presidente' => $request->presidente,
                'finalidade' => $request->finalidade,
                'contato' => $request->contato,
                'telefone' => $request->telefone,
                'celular' => $request->celular,
            ]);

        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar nova Entidade: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    private function setRole(User $user)
    {
        $roleRotary = Role::where('name', 'entidade')->first();
        $user->roles()->attach($roleRotary->id);
    }

    public function listar(){
        try{
            return Entidade::all();
        } catch (Exception $e){
            throw new Exception('Erro ao listar entidades: ' . $e->getMessage());
        }
    }

    public function getById($idEntidade){
        try{
            return Entidade::query()->find($idEntidade);
        } catch (Exception $e){
            throw new Exception('Erro ao recuperar entidade do banco: ' . $e->getMessage());
        }
    }

    public function excluir($idEntidade){
        DB::connection('mysql')->beginTransaction();
        try {
            $user_entidade = Entidade::query()->find($idEntidade);
            $user = User::query()->find($user_entidade->user_id);
            $user_entidade->delete();
            $user->delete();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao excluir entidade: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public function editar($nova_info, $idUsuario){
        DB::connection('mysql')->beginTransaction();
        try {
            $user_entidade = Entidade::query()->find($idUsuario);
            $user = User::query()->find($user_entidade->user_id);
            $endereco = $user->enderecos()->first();

            dd($endereco);

            if(isset($nova_info['nome'])){
                $user_entidade->name = $nova_info['nome'];
                $user->name = $nova_info['nome'];
            }

            if(isset($nova_info['email'])){
                $user_entidade->email = $nova_info['email'];
                $user->email = $nova_info['email'];
            }

            if(isset($nova_info['password']))
                $user->password = bcrypt($nova_info['password']);

            if(isset($nova_info['cnpj']))
                $user_entidade->cnpj = $nova_info['cnpj'];

            if(isset($nova_info['presidente']))
                $user_entidade->presidente = $nova_info['presidente'];

            if(isset($nova_info['finalidade']))
                $user_entidade->finalidade = $nova_info['finalidade'];

            if(isset($nova_info['contato']))
                $user_entidade->contato = $nova_info['contato'];

            if(isset($nova_info['telefone']))
                $user_entidade->telefone = $nova_info['telefone'];

            if(isset($nova_info['celular']))
                $user_entidade->celular = $nova_info['celular'];

            if(isset($nova_info['cep']))
                $endereco->cep = $nova_info['cep'];

            if(isset($nova_info['logradouro']))
                $endereco->logradouro = $nova_info['logradouro'];

            if(isset($nova_info['numero']))
                $endereco->numero = $nova_info['numero'];

            if(isset($nova_info['bairro']))
                $endereco->bairro = $nova_info['bairro'];

            if(isset($nova_info['cidade']))
                $endereco->cidade = $nova_info['cidade'];

            if(isset($nova_info['uf']))
                $endereco->uf = $nova_info['uf'];

            if(isset($nova_info['pais']))
                $endereco->pais = $nova_info['pais'];

            $endereco->update();
            $user->update();
            $user_entidade->update();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar novo usuário Rotary: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }
}