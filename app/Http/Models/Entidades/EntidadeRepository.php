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
                'nome' => 'required',
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
                'numero' => 'required|numeric',
                'password' => 'required|max:60|confirmed',
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
}