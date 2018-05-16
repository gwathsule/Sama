<?php

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/03/2018
 * Time: 20:05
 */
namespace App\Http\Controllers\Doador;

use App\Http\Controllers\Controller;
use App\Http\Models\Doadores\DoadorRepository;
use App\Http\Models\Users\UserRepository;
use Auth;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $doadorDB;
    protected $request;
    protected $userDB;

    /**
     * HomeController constructor.
     */
    public function __construct(Request $request, DoadorRepository $doadorDB, UserRepository $userDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');

        $this->userDB = $userDB;
        $this->doadorDB = $doadorDB;
        $this->request = $request;
    }

    public function home(){
        return view('welcome');
    }

    public function doacoes(){
        try{
            $doador = $this->doadorDB->getByUserId(Auth::user()->id);
            $doacoes = $this->doadorDB->getAllDoacoesByDoador($doador->id);
            return view('acompanhar_doacoes', compact('doacoes', 'doador'));
        } catch (Exception $e){
            return back()->withErrors('Erro ao recuperar doações: ' . $e->getMessage());
        }
    }

    public function perfil(){
        $user_atual = Auth::user();
        $doador = $this->doadorDB->getByUserId($user_atual->id);
        $endereco_principal = $user_atual->enderecos()->first();
        return view('perfil', compact('doador', 'user_atual', 'endereco_principal'));
    }

    public function update(){
        try{
            $info_alteradas = $this->getInfoAlteradas($this->request);

            if(strcmp($this->request->tipoPessoa, "pessoaFisica") == 0)
                $validator = $this->doadorDB->validarEdicaoPessoaFisica($info_alteradas);
            else
                $validator = $this->doadorDB->validarEdicaoPessoaJuridica($info_alteradas);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            
            $this->doadorDB->editar($info_alteradas, $this->request->id, $this->request->tipoPessoa);

            return back()
                ->with('success', 'Usuário alterado com sucesso!');
            
        } catch ( Exception $ex){
            return back()->withErrors('Erro ao alterar: ' . $ex->getMessage());
        }
    }

    /**
     * Retorna um array com apenas as informações que foram alteradas no usuário
     * @param Request $request
     * @return array
     * @throws Exception
     */
    private function getInfoAlteradas(Request $request){
        $old_doador = $this->doadorDB->getById($request->id);
        $old_user = $this->userDB->getById($old_doador->user_id);
        $old_endereco_principal = $old_user->enderecos()->first();
        //monta um array com as informações que foram alteradas:
        $info_alteradas = array();
        if(strcmp($request->tipoPessoa, "pessoaFisica") == 0){
            if(strcmp($old_doador->name, $request->nome) != 0)
                $info_alteradas['nome'] = $request->nome;

            if(strcmp($old_doador->cpf, $this->soNumero($request->cpf)) != 0)
                $info_alteradas['cpf'] = $request->cpf;
        } else {
            if(strcmp($old_doador->name, $request->razao) != 0)
                $info_alteradas['nome'] = $request->razao;

            if(strcmp($old_doador->cnpj, $this->soNumero($request->cnpj)) != 0)
                $info_alteradas['cnpj'] = $request->cnpj;

            if(strcmp($old_doador->contato, $request->contato) != 0)
                $info_alteradas['contato'] = $request->contato;
        }

        if(strcmp($old_doador->email, $request->email) != 0)
            $info_alteradas['email'] = $request->email;

        if(strcmp($old_doador->telefone, $this->soNumero($request->telefone)) != 0)
            $info_alteradas['telefone'] = $request->telefone;

        if(strcmp($old_doador->celular, $this->soNumero($request->celular)) != 0)
            $info_alteradas['celular'] = $request->celular;

        if(strcmp($this->request->password, '') != 0) {
            $info_alteradas['password'] = $request->password;
            $info_alteradas['password_confirmation'] = $request->password_confirmation;
        }

        if(strcmp($old_endereco_principal->cep, $this->soNumero($request->cep)) != 0)
            $info_alteradas['cep'] = $request->cep;

        if(strcmp($old_endereco_principal->logradouro, $request->rua) != 0)
            $info_alteradas['logradouro'] = $request->rua;

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

    function soNumero($str) {
        return preg_replace("/[^0-9]/", "", $str);
    }
}