<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 07/05/2018
 * Time: 18:55
 */

namespace App\Http\Controllers\Rotary;


use App\Http\Controllers\Controller;
use App\Http\Models\Doadores\DoadorRepository;
use Illuminate\Http\Request;

class DoadorController extends Controller
{
    protected $request;
    protected $doadorDB;

    /**
     * DoacaoController constructor.
     */
    public function __construct(Request $request, DoadorRepository $doadorDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        $this->doadorDB = $doadorDB;
    }

    public function aprovarDoacao($idDoacao){
        try{

            $this->doadorDB->aprovarDoacao($idDoacao);

            return back()
                ->with('success', 'Produto aprovado com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public function excluirDoacao($idDoacao){
        try{

            $this->doadorDB->excluirPedido($idDoacao);

            return back()
                ->with('success', 'Produto excluído com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }
}