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
use App\Http\Models\Mediador\RotaryRepository;
use Illuminate\Http\Request;

class RotaryController extends Controller
{
    protected $request;
    protected  $rotaryDB;

    public function __construct(Request $request, RotaryRepository $rotaryDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        $this->rotaryDB = $rotaryDB;
    }

    public function novo(){
        try {
            $validator = $this->rotaryDB->validarNovo($this->request);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $this->rotaryDB->novo($this->request);

            return back()
                ->with('success', 'Usuário Rotary cadastrado com sucesso');
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

    public function editar(){
        try{
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
        }
    }

    /**
     * Retorna um array com apenas as informações que foram alteradas no usuário
     * @param Request $request
     * @return array
     * @throws Exception
     */
    private function getInfoAlteradas(Request $request){
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
    }

    public function excluir($idUsuario){
        try{

            $this->rotaryDB->excluir($idUsuario);

            return back()
                ->with('success', 'Usuário excluído com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

}