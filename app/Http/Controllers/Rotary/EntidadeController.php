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
use Illuminate\Http\Request;
use Exception;

class EntidadeController  extends Controller
{
    protected $request;
    protected  $entidadeDB;

    public function __construct(Request $request, EntidadeRepository $entidadeDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        $this->entidadeDB = $entidadeDB;
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
        dd('editar');
        /*try{
            $info_alteradas = $this->getInfoAlteradas($this->request);

            $validator = $this->rotaryDB->validarEdicao($info_alteradas);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $this->rotaryDB->editar($info_alteradas, $this->request->id);

            return back()
                ->with('success', 'Usuário alterado com sucesso!');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }*/
    }

    /**
     * Retorna um array com apenas as informações que foram alteradas no usuário
     * @param Request $request
     * @return array
     * @throws Exception
     */
    private function getInfoAlteradas(Request $request){
        dd('getInfo alteradas');
        /*
        $old_rotary = $this->rotaryDB->getById($request->id);

        //monta um array com as informações que foram alteradas:
        $info_alteradas = array();
        if(strcmp($old_rotary->name, $request->nome) != 0)
            $info_alteradas['nome'] = $request->nome;

        if(strcmp($old_rotary->email, $request->email) != 0)
            $info_alteradas['email'] = $request->email;

        if(strcmp($old_rotary->cpf, $request->cpf) != 0)
            $info_alteradas['cpf'] = $request->cpf;

        if(strcmp($old_rotary->celular, $request->celular) != 0)
            $info_alteradas['celular'] = $request->celular;

        if(strcmp($this->request->password, '') != 0) {
            $info_alteradas['password'] = $request->password;
            $info_alteradas['password_confirmation'] = $request->password_confirmation;
        }

        return $info_alteradas;
        */
    }

    public function excluir($idUsuario){
        dd('excluir');
        /*try{

            $this->rotaryDB->excluir($idUsuario);

            return back()
                ->with('success', 'Usuário excluído com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }*/
    }
}