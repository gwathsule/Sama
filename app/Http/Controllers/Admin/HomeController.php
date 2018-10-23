<?php

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/03/2018
 * Time: 20:05
 */
namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Models\Mediador\MediadorRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $request;
    protected  $mediadorDB;

    /**
     * HomeController constructor.
     */
    public function __construct(Request $request, MediadorRepository $mediadorDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        $this->mediadorDB = $mediadorDB;
    }

    public function home(){
        return view('panel::admin.home');
    }

    public function new_mediador_index(){
        return view('panel::admin.mediador.new');
    }

    public function edit_mediador_index($idUsuario){
        try {
            $usuario = $this->mediadorDB->getById($idUsuario);
            return view('panel::admin.mediador.edit', compact('usuario'));
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public function list_mediador_index(){
        try{
            $lista = $this->mediadorDB->listar();
            return view('panel::admin.mediador.list', compact('lista'));
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }
}