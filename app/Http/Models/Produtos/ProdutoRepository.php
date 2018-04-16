<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 08/04/2018
 * Time: 14:14
 */

namespace App\Http\Models\Produtos;

use DB;
use Validator;
use Exception;
use Illuminate\Http\Request;

class ProdutoRepository
{

    /**
     * ProdutoRepository constructor.
     */
    public function __construct()
    {
    }

    public function validarNovo(Request $request){
        // 'nome', 'descricao', 'qtd', 'unidade', 'categoria'
        return
            Validator::make($request->all(), [
                'nome' => 'required|max:255',
                'descricao' => 'required|max:2000',
                'qtd' => 'required|numeric',
                'unidade' => 'required|numeric',
                'categoria' => 'required|numeric',
            ]);
    }

    public function novo(Request $request){
        DB::connection('mysql')->beginTransaction();
        try {
            $novo_produto = Produto::create([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'qtd' => $request->qtd,
                'unidade' => $request->unidade,
                'categoria' => $request->categoria,
            ]);

        } catch (Exception $e){
            DB::connection('mysql')->rollBack();
            throw new Exception('Erro ao cadastrar novo produto: ' . $e->getMessage());
        }
        DB::connection('mysql')->commit();
    }
}