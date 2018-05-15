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
use Auth;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $doadorDB;
    protected $request;

    /**
     * HomeController constructor.
     */
    public function __construct(Request $request, DoadorRepository $doadorDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');

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
        dd($this->request);
    }
}