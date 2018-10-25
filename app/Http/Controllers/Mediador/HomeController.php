<?php

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/03/2018
 * Time: 20:05
 */
namespace App\Http\Controllers\mediador;

use App\Http\Models\Entidades\EntidadeRepository;
use App\Http\Models\Users\UserRepository;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $request;
    protected  $entidadeDB;
    protected  $userDB;

    /**
     * HomeController constructor.
     */
    public function __construct(Request $request, EntidadeRepository $entidadeDB, UserRepository $userDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        $this->entidadeDB = $entidadeDB;
        $this->userDB = $userDB;
    }

    public function home(){
        return view('panel::mediador.home');
    }

    public function new_entidade_index(){
        return view('panel::mediador.entidade.new');
    }

    public function edit_entidade_index($idUsuario){
        try {
            $entidade = $this->entidadeDB->getById($idUsuario);
            $user = $this->userDB->getById($entidade->user_id);
            return view('panel::mediador.entidade.edit', compact('entidade', 'user'));
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public function list_entidade_index(){
        try{
            $lista = $this->entidadeDB->listar();
            return view('panel::mediador.entidade.list', compact('lista'));
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public function demandaMensal($idEntidade){
        try{
            $entidade = $this->entidadeDB->getById($idEntidade);
            return view('panel::mediador.entidade.demandaMensal', compact('entidade'));
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public  function novas_necessidades(){
        try{
            $pedidos = $this->entidadeDB->getAllNovosPedidos();
            return view('panel::mediador.novas_necessidades', compact('pedidos'));
        } catch (Exception $e){
            dd($e->getMessage());
            return back()
                ->withErrors($e->getMessage());
        }
    }
}