<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 05/05/2018
 * Time: 14:28
 */

namespace App\Http\Models\Pedidos;


class PedidosRepository
{
    public function getPrimeiras10DoacoesByData(){
        $lista = Pedido::query()
            ->where('status', '=', 3)
            ->limit(10)
            ->get()
            ->sortBy('dataPrecisao');
        return $lista;
    }
}