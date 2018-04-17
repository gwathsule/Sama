<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 25/03/2018
 * Time: 12:31
 */

namespace App\Http\Controllers\Rotary;

use App\Http\Controllers\Controller;
use App\Http\Models\Entidades\EntidadeRepository;
use App\Http\Models\Users\UserRepository;
use Illuminate\Http\Request;
use Exception;

class EntidadeController  extends Controller
{
    protected $request;
    protected  $entidadeDB;
    protected $userDB;

    public function __construct(Request $request, EntidadeRepository $entidadeDB, UserRepository $userDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        $this->entidadeDB = $entidadeDB;
        $this->userDB = $userDB;
    }

    public function novo(){
        try {
            $validator = $this->entidadeDB->validarNovo($this->request);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            
            $this->entidadeDB->novo($this->request);

            return back()
                ->with('success', 'Entidade cadastrada com sucesso');
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

    public function editar(){
        try{
            $info_alteradas = $this->getInfoAlteradas($this->request);

            $validator = $this->entidadeDB->validarEdicao($info_alteradas);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $this->entidadeDB->editar($info_alteradas, $this->request->id);

            return back()
                ->with('success', 'Usuário alterado com sucesso!');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Retorna um array com apenas as informações que foram alteradas no usuário
     * @param Request $request
     * @return array
     * @throws Exception
     */
    private function getInfoAlteradas(Request $request){
        $old_entidade = $this->entidadeDB->getById($request->id);
        $old_user = $this->userDB->getById($old_entidade->user_id);
        $old_endereco_principal = $old_user->enderecos()->first();
        //monta um array com as informações que foram alteradas:
        $info_alteradas = array();
        if(strcmp($old_entidade->name, $request->nome) != 0)
            $info_alteradas['nome'] = $request->nome;

        if(strcmp($old_entidade->email, $request->email) != 0)
            $info_alteradas['email'] = $request->email;

        if(strcmp($old_entidade->cnpj, $request->cnpj) != 0)
            $info_alteradas['cnpj'] = $request->cnpj;

        if(strcmp($old_entidade->finalidade, $request->finalidade) != 0)
            $info_alteradas['finalidade'] = $request->finalidade;

        if(strcmp($old_entidade->contato, $request->contato) != 0)
            $info_alteradas['contato'] = $request->contato;

        if(strcmp($old_entidade->telefone, $request->telefone) != 0)
            $info_alteradas['telefone'] = $request->telefone;

        if(strcmp($old_entidade->celular, $request->celular) != 0)
            $info_alteradas['celular'] = $request->celular;

        if(strcmp($this->request->password, '') != 0) {
            $info_alteradas['password'] = $request->password;
            $info_alteradas['password_confirmation'] = $request->password_confirmation;
        }

        if(strcmp($old_endereco_principal->cep, $request->cep) != 0)
            $info_alteradas['cep'] = $request->cep;

        if(strcmp($old_endereco_principal->logradouro, $request->logradouro) != 0)
            $info_alteradas['logradouro'] = $request->logradouro;

        if(strcmp($old_endereco_principal->numero, $request->numero) != 0)
            $info_alteradas['numero'] = $request->numero;

        if(strcmp($old_endereco_principal->bairro, $request->bairro) != 0)
            $info_alteradas['bairro'] = $request->bairro;

        if(strcmp($old_endereco_principal->cidade, $request->cidade) != 0)
            $info_alteradas['cidade'] = $request->cidade;

        if(strcmp($old_endereco_principal->uf, $request->uf) != 0)
            $info_alteradas['uf'] = $request->uf;

        if(strcmp($old_endereco_principal->pais, $request->pais) != 0)
            $info_alteradas['pais'] = $request->pais;
        
        return $info_alteradas;
    }

    public function excluir($idUsuario){
        try{

            $this->entidadeDB->excluir($idUsuario);

            return back()
                ->with('success', 'Usuário excluído com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public function novaDemanda(){
        try{
            $this->entidadeDB->criarDemanda($this->request);
            return back()
                ->with('success', 'Demanda cadastrada com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public function cadastrarProdutoDemanda(){
        try{
            $this->entidadeDB->cadastrarProdutoDemanda($this->request);
            return back()
                ->with('success', 'Produto cadastrado com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }
}