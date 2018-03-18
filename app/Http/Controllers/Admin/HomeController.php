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
use App\Http\Models\Rotaries\RotaryRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $request;
    protected  $rotaryDB;

    /**
     * HomeController constructor.
     */
    public function __construct(Request $request, RotaryRepository $rotaryDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        $this->rotaryDB = $rotaryDB;
    }

    public function home(){
        return view('panel::admin.home');
    }

    public function new_rotary_index(){
        return view('panel::admin.rotary.new');
    }

    public function edit_rotary_index($idUsuario){
        try {
            $usuario = $this->rotaryDB->getById($idUsuario);
            return view('panel::admin.rotary.edit', compact('usuario'));
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public function list_rotary_index(){
        try{
            $lista = $this->rotaryDB->listar();
            return view('panel::admin.rotary.list', compact('lista'));
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }
}