<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 02/05/2018
 * Time: 19:57
 */

namespace App\Http\Models\Doadores;

use Illuminate\Http\Request;

class DoadorRepository
{
    public function validarNovaPessoaFisica(Request $request){
        return
            Validator::make($request->all(), [
                'email' => 'required|max:255|email',
                'celular' => 'required|max:15',
                'telefone' => 'required|max:14',
                'nome' => 'required|max:255',
                'cpf' => 'max:14',
                'razao' => 'max:255',
                'cnpj' => 'max:19',
                'logotipo' => 'file|image',
                'cep' => 'required|max:255',
                'rua' => 'required|max:255',
                'numero' => 'required|max:255',
                'bairro' => 'required|max:255',
                'cidade' => 'required|max:255',
                'uf' => 'required|max:255',
                'pais' => 'required|max:255',
                'password' => 'required|confirmed',
            ]);
    }

    public function validarNovaPessoaJuridica(Request $request){
        return
            Validator::make($request->all(), [
                'email' => 'required|max:255|email',
                'celular' => 'required|max:15',
                'telefone' => 'required|max:14',
                'nome' => 'max:255',
                'cpf' => 'max:14',
                'razao' => 'required|max:255',
                'cnpj' => 'required|max:19',
                'logotipo' => 'file|image',
                'cep' => 'required|max:255',
                'rua' => 'required|max:255',
                'numero' => 'required|max:255',
                'bairro' => 'required|max:255',
                'cidade' => 'required|max:255',
                'uf' => 'required|max:255',
                'pais' => 'required|max:255',
                'password' => 'required|confirmed',
            ]);
    }

    public function novaPessoaFisica(Request $request){
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

    public function novaPessoaJuridica(Request $request){
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

}