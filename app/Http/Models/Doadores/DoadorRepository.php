<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 02/05/2018
 * Time: 19:57
 */

namespace App\Http\Models\Doadores;

use App\Http\Models\Pedidos\PedidosRepository;
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

    public function validarEdicaoPessoaFisica($info_editadas){
        return
            $validator = Validator::make($info_editadas, [
                'email' => 'sometimes|max:255|email',
                'celular' => 'sometimes|max:15',
                'telefone' => 'sometimes|max:14',
                'nome' => 'sometimes|max:255',
                'cpf' => 'sometimes|max:14',
                'razao' => 'sometimes|max:255',
                'cnpj' => 'sometimes|max:19',
                'contato' => 'sometimes|max:255',
                'logotipo' => 'sometimes|file|image',
                'cep' => 'sometimes|max:255',
                'rua' => 'sometimes|max:255',
                'numero' => 'sometimes|max:255',
                'bairro' => 'sometimes|max:255',
                'cidade' => 'sometimes|max:255',
                'uf' => 'sometimes|max:255',
                'pais' => 'sometimes|max:255',
                'password' => 'sometimes|confirmed',
            ]);
    }

    public function validarEdicaoPessoaJuridica($info_editadas){
        return
            $validator = Validator::make($info_editadas, [
                'email' => 'sometimes|max:255|email',
                'celular' => 'sometimes|max:15',
                'telefone' => 'sometimes|max:14',
                'nome' => 'sometimes|max:255',
                'cpf' => 'sometimes|max:14',
                'contato' => 'sometimes|max:255',
                'razao' => 'sometimes|max:255',
                'cnpj' => 'sometimes|max:19',
                'logotipo' => 'sometimes|file|image',
                'cep' => 'sometimes|max:255',
                'rua' => 'sometimes|max:255',
                'numero' => 'sometimes|max:255',
                'bairro' => 'sometimes|max:255',
                'cidade' => 'sometimes|max:255',
                'uf' => 'sometimes|max:255',
                'pais' => 'sometimes|max:255',
                'password' => 'sometimes|confirmed',
            ]);
    }

    public function editar($nova_info, $idUsuario, $tipoUsuario){
        DB::connection('mysql')->beginTransaction();
        try {
            $user_doador = Doador::query()->find($idUsuario);
            $user = User::query()->find($user_doador->user_id);
            $endereco = $user->enderecos()->first();

            if(strcmp($tipoUsuario, "pessoaFisica") == 0){
                if(isset($nova_info['nome'])){
                    $user_doador->name = $nova_info['nome'];
                    $user->name = $nova_info['nome'];
                }

                if(isset($nova_info['cpf']))
                    $user_doador->cpf = $this->soNumero($nova_info['cpf']);

            } else {
                if(isset($nova_info['razao'])){
                    $user_doador->name = $nova_info['razao'];
                    $user->name = $nova_info['razao'];
                }

                if(isset($nova_info['cnpj']))
                    $user_doador->cnpj = $this->soNumero($nova_info['cnpj']);

                if(isset($nova_info['contato']))
                    $user_doador->contato = $nova_info['contato'];

            }

            if(isset($nova_info['email'])){
                $user_doador->email = $nova_info['email'];
                $user->email = $nova_info['email'];
            }

            if(isset($nova_info['password']))
                $user->password = bcrypt($nova_info['password']);

            if(isset($nova_info['telefone']))
                $user_doador->telefone = $this->soNumero($nova_info['telefone']);

            if(isset($nova_info['celular']))
                $user_doador->celular = $this->soNumero($nova_info['celular']);

            if(isset($nova_info['cep']))
                $endereco->cep = $this->soNumero($nova_info['cep']);

            if(isset($nova_info['rua']))
                $endereco->logradouro = $nova_info['rua'];

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
            $user_doador->update();
            
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao editar informações: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
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

    public function getAllDoacoesAndamento(){
        try {
            return Doacao::query()->where('status','>', 1)->get();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao recuperar doações : ' . $e->getMessage());
        }
    }

    public function getAllDoacoesAprovadas(){
        try {
            return Doacao::query()->where('status','=', 2)->get();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao recuperar doações : ' . $e->getMessage());
        }
    }

    public function getAllDoacoesEmEstoque(){
        try {
            return Doacao::query()->where('status','=', 3)->get();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao recuperar doações : ' . $e->getMessage());
        }
    }

    public function getAllDoacoesEntregue(){
        try {
            return Doacao::query()->where('status','=', 4)->get();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao recuperar doações : ' . $e->getMessage());
        }
    }


    public function getAllNovasDoacoes(){
        try {
            return Doacao::query()->where('status','=', 1)->get();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao recuperar doações: ' . $e->getMessage());
        }
    }

    public function getAllDoacoesByDoador($idDoador){
        try {
            $doador = Doador::query()->find($idDoador);
            return $doador->doacoes()->get();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao recuperar doações: ' . $e->getMessage());
        }
    }
    
    public function getById($idDoador){
        return Doador::query()->find($idDoador);
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

    public function aprovarDoacao($idDoacao){
        DB::connection('mysql')->beginTransaction();
        try {
            $pedidoDB = new PedidosRepository();
            $doacao = Doacao::query()->find($idDoacao);
            $pedido = $pedidoDB->getById($doacao->pedido_id);
            $produto = $pedido->produto()->first();
            $statusAnterior = $doacao->status;

            if(strcmp($statusAnterior, 'Em Aprovacação') == 0){
                $doacao->status = 2;
                $produto->qtd = $produto->qtd - $doacao->qtd_item;
            }

            $doacao->update();
            $produto->update();

            if($statusAnterior == 1){
                if($produto->qtd <= 0){
                    $pedido->status = 4;
                    $pedido->update();
                }
            }

        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao aprovar : ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public function excluirDoacao($idDoacao){
        DB::connection('mysql')->beginTransaction();
        try {
            $doacao = Doacao::query()->find($idDoacao);
            $doacao->delete();
        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao deletar : ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }

    public  function marcarComoEstoque($idDoacao){
        $doacao = Doacao::query()->find($idDoacao);
        $doacao->status = 3;
        $doacao->update();
    }

    public  function marcarComoEntregue($idDoacao){
        $doacao = Doacao::query()->find($idDoacao);
        $doacao->status = 4;
        $doacao->update();
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
        $roleRotary = Role::where('name', 'doador')->first();
        $user->roles()->attach($roleRotary->id);
    }


    private function soNumero($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }
}