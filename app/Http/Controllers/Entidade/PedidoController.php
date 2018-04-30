<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 29/04/2018
 * Time: 15:15
 */

namespace App\Http\Controllers\Entidade;


use App\Http\Controllers\Controller;
use App\Http\Models\Entidades\EntidadeRepository;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    
    protected $request;
    protected $entidadeDB;

    /**
     * PedidoController constructor.
     */
    public function __construct(EntidadeRepository $entidadeDB, Request $request)
    {
        $this->request = $request;
        $this->entidadeDB = $entidadeDB;
    }

    public function novo(){
        try {
            $validator = $this->entidadeDB->validarNovoPedido($this->request);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $this->entidadeDB->novoPedido($this->request);

            return back()->with('success', 'Necessidade cadastrada com sucesso');
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

    public function excluir($idEntidade, $idPedido){
        try {
            
            $this->entidadeDB->excluirPedido($idPedido);

            return back()->with('success', 'Necessidade apagada com sucesso');
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }
}