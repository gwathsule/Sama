<?php

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/03/2018
 * Time: 20:05
 */
namespace App\Http\Controllers\Rotary;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Models\Rotaries\RotaryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $request;
    //protected  $entidadeDB;

    /**
     * HomeController constructor.
     */
    public function __construct(Request $request/*, RotaryRepository $rotaryDB*/)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        //$this->entidadeDB = $rotaryDB;
    }

    public function home(){
        return view('panel::rotary.home');
    }

    public function new_entidade_index(){
        return view('panel::rotary.entidade.new');
    }

    public function edit_entidade_index($idUsuario){
        dd('editar entidade');
        /*try {
            $usuario = $this->entidadeDB->getById($idUsuario);
            return view('panel::rotary.entidade.edit', compact('usuario'));
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }*/
    }

    public function list_entidade_index(){
        dd('listar entidade');
        /*try{
            $lista = $this->entidadeDB->listar();
            return view('panel::rotary.entidade.list', compact('lista'));
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }*/
    }
}