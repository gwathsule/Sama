<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 07/05/2018
 * Time: 18:55
 */

namespace App\Http\Controllers\Rotary;

use Exception;
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
                ->with('success', 'Doação aprovada com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public function excluirDoacao($idDoacao){
        try{

            $this->doadorDB->excluirDoacao($idDoacao);

            return back()
                ->with('success', 'Doação excluída com sucesso');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public  function marcarComoEstoque($idDoacao){
        try{

            $this->doadorDB->marcarComoEstoque($idDoacao);

            return back()
                ->with('success', 'Doacao marcada como "em estoque"');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public  function marcarComoEntregue($idDoacao){
        try{

            $this->doadorDB->marcarComoEntregue($idDoacao);

            return back()
                ->with('success', 'Doacao marcada como "entregue"');
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

    public function getByDoacaoFiltro(){
        try{
            switch ($this->request->status_doacao){
                case 'todos':
                    $doacoes = $this->doadorDB->getAllDoacoesAndamento();
                    break;

                case 'aprovados':
                    $doacoes = $this->doadorDB->getAllDoacoesAprovadas();
                    break;

                case 'em_estoque':
                    $doacoes = $this->doadorDB->getAllDoacoesEmEstoque();
                    break;

                case 'entregue':
                    $doacoes = $this->doadorDB->getAllDoacoesEntregue();
                    break;

                default:
                    throw new Exception('parâmetro inválido informado');
            }

            return view('panel::rotary.doacoes_andamento', compact('doacoes'));
        } catch (Exception $e){
            return back()
                ->withErrors($e->getMessage());
        }
    }

}