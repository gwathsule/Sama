<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 02/05/2018
 * Time: 19:57
 */

namespace App\Http\Models\Doadores;

use App\Http\Models\Users\Role;
use App\Http\Models\Users\User;
use DB;
use Validator;
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
                'contato' => 'max:255',
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
                'contato' => 'required|max:255',
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

    public function validarNovaDoacao(Request $request){
        return
            Validator::make($request->all(), [
                'doadorId' => 'required',
                'pedidoId' => 'required',
                'qtd_item' => 'required|numeric',
                'dataDisponivel' => 'required|date',
            ]);
    }

    public function novaDoacao(Request $request){
        DB::connection('mysql')->beginTransaction();

        try {
            $doador = Doador::query()->find($request->doadorId);

            $doacao = $doador->doacoes()->create([
                'dataEntrega' => null,
                'dataDisponivel' => $request->dataDisponivel,
                'status' => 1,
                'qtd_item' => $request->qtd_item,
                'pedido_id' => $request->pedidoId
            ]);

        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar nova doação: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public function novaPessoaFisica(Request $request){
        DB::connection('mysql')->beginTransaction();
        try {
            $novo_user = User::create([
                'name' => $request->nome,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'tipo' => 1,
            ]);

            $this->setRole($novo_user);

            $novo_user->enderecos()->create([
                'cep' => $this->soNumero($request->cep),
                'logradouro' => $request->rua,
                'numero' => $request->numero,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'pais' => $request->pais,
                'nome' => 'Endereço Principal'
            ]);

            $novo_doador = Doador::create([
                'tipo' => 1,
                'name' => $request->nome,
                'email' => $request->email,
                'user_id' => $novo_user->id,
                'cpf' => $this->soNumero($request->cpf),
                'cnpj' => null,
                'telefone' => $this->soNumero($request->telefone),
                'celular' => $this->soNumero($request->celular),
                'logo_arquivo' => null,
            ]);

        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar novo doador: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public function novaPessoaJuridica(Request $request){
        DB::connection('mysql')->beginTransaction();
        try {
            $novo_user = User::create([
                'name' => $request->razao,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'tipo' => 1,
            ]);

            $this->setRole($novo_user);

            $novo_user->enderecos()->create([
                'cep' => $this->soNumero($request->cep),
                'logradouro' => $request->rua,
                'numero' => $request->numero,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'pais' => $request->pais,
                'nome' => 'Endereço Principal'
            ]);

            $logo = $request->file('logotipo');
            $nomeArquivo = null;

            if($logo != null) {
                if (env('LOGOTIPO_DIR') == null) {
                    $caminho_logotipos = storage_path() . '/app/public/logotipos/';
                } else {
                    $caminho_logotipos = storage_path() . env('LOGOTIPO_DIR');
                }
                date_default_timezone_set('America/Sao_Paulo');
                $nomeArquivo = 'logo_' . date_create()->getTimestamp() . '.' . $logo->getClientOriginalExtension();
                $logo->move($caminho_logotipos, $nomeArquivo);
                sleep(1);
            }

            $novo_doador = Doador::create([
                'tipo' => 2,
                'name' => $request->razao,
                'email' => $request->email,
                'contato' => $request->contato,
                'user_id' => $novo_user->id,
                'cpf' => null,
                'cnpj' => $this->soNumero($request->cnpj),
                'telefone' => $this->soNumero($request->telefone),
                'celular' => $this->soNumero($request->celular),
                'logo_arquivo' => $nomeArquivo,
            ]);

        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar novo doador tipo empresa: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public function getByUserId($userId){
        return Doador::query()->where('user_id', '=', $userId)->first();
    }

    private function setRole(User $user)
    {
        $rolemediador = Role::where('name', 'mediador')->first();
        $user->roles()->attach($rolemediador->id);
    }


    function soNumero($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }
}