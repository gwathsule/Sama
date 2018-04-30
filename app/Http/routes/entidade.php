<?php

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 21:28
 */
Route::group(['middleware' => ['checaPermissao:entidade'] ,'prefix' => 'painel/entidade'], function () {

    Route::get('/', 'PanelController@homeEntidade');
    Route::get('/home',     ['as' => 'entidade.home',      'uses' => 'Entidade\HomeController@home']);
    Route::get('/home/list/necessidade', ['as' => 'entidade.home.list.necessidade', 'uses' => 'Entidade\HomeController@list_pedido_index']);
    
    //pedidos
    Route::post('/pedido/novo', ['as' => 'entidade.pedido.novo', 'uses' => 'Entidade\PedidoController@novo']);
    Route::get('/pedido/excluir/{idEntidade}/{idPedido}', ['as' => 'entidade.pedido.excluir', 'uses' => 'Entidade\PedidoController@excluir']);
});