<?php

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/03/2018
 * Time: 20:05
 */
namespace App\Http\Controllers\Entidade;

use App\Http\Models\Entidades\EntidadeRepository;
use App\Http\Models\Users\UserRepository;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('panel::entidade.home');
    }

    public function list_pedido_index(){
        try{
            $entidade = $this->entidadeDB->getByUserId(Auth::user()->id);
            $lista = $this->entidadeDB->listarPedidos($entidade->id);
            return view('panel::entidade.listaPedidos', compact('lista', 'entidade'));
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }
}