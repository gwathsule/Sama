<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 12/03/2018
 * Time: 22:02
 */

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Models\Mediador\MediadorRepository;
use Illuminate\Http\Request;

class mediadorController extends Controller
{
    protected $request;
    protected  $mediadorDB;

    public function __construct(Request $request, mediadorRepository $mediadorDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        $this->mediadorDB = $mediadorDB;
    }

    public function novo(){
        try {

            if($this->request->cnpj == "" && $this->request->cpf == "")
                return back()
                    ->withErrors(["É necessário informar ao menos um cnpj ou cpf"])
                    ->withInput();

            $validator = $this->mediadorDB->validarNovo($this->request);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $this->mediadorDB->novo($this->request);

            return back()
                ->with('success', 'Usuário mediador cadastrado com sucesso');
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

    public function editar(){
        try{

            if($this->request->cnpj == "" && $this->request->cpf == "")
                return back()
                    ->withErrors(["É necessário informar ao menos um cnpj ou cpf"])
                    ->withInput();
            
            $info_alteradas = $this->getInfoAlteradas($this->request);
            $validator = $this->mediadorDB->validarEdicao($info_alteradas);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $this->mediadorDB->editar($info_alteradas, $this->request->id);

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
        $old_mediador = $this->mediadorDB->getById($request->id);

        //monta um array com as informações que foram alteradas:
        $info_alteradas = array();

        if(strcmp($old_mediador->nome_grupo, $request->nome_grupo) != 0)
            $info_alteradas['nome_grupo'] = $request->nome_grupo;

        if(strcmp($old_mediador->email, $request->email) != 0)
            $info_alteradas['email'] = $request->email;

        if(strcmp($old_mediador->cpf, $request->cpf) != 0)
            $info_alteradas['cpf'] = $request->cpf;

        if(strcmp($old_mediador->cnpj, $request->cnpj) != 0)
            $info_alteradas['cnpj'] = $request->cnpj;

        if(strcmp($old_mediador->celular, $request->celular) != 0)
            $info_alteradas['celular'] = $request->celular;

        if(strcmp($old_mediador->telefone, $request->telefone) != 0)
            $info_alteradas['telefone'] = $request->telefone;

        if(strcmp($old_mediador->nome_responsavel, $request->nome_responsavel) != 0)
            $info_alteradas['nome_responsavel'] = $request->nome_responsavel;

        if($old_mediador->quantidade_membros != intval($request->quantidade_membros))
            $info_alteradas['quantidade_membros'] = $request->quantidade_membros;

        if(strcmp($this->request->password, '') != 0) {
            $info_alteradas['password'] = $request->password;
            $info_alteradas['password_confirmation'] = $request->password_confirmation;
        }

        return $info_alteradas;
    }

    public function excluir($idUsuario){
        try{

            $this->mediadorDB->excluir($idUsuario);

            return back()
                ->with('success', 'Usuário excluído com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

}