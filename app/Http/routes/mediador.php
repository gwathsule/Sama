<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 21:28
 */
Route::group(['middleware' => ['checaPermissao:mediador'] ,'prefix' => 'painel/mediador'], function () {

    Route::get('/', 'PanelController@homemediador');
    Route::get('/home',     ['as' => 'mediador.home',      'uses' => 'mediador\HomeController@home']);

    //pages
    Route::get('/home/new/entidade',                        ['as' => 'mediador.home.new.entidade',       'uses' => 'mediador\HomeController@new_entidade_index']);
    Route::get('/home/list/entidade',                       ['as' => 'mediador.home.list.entidade',      'uses' => 'mediador\HomeController@list_entidade_index']);
    Route::get('/home/edit/entidade/{idEntidade}',          ['as' => 'mediador.home.edit.entidade',      'uses' => 'mediador\HomeController@edit_entidade_index']);
    Route::get('/home/edit/entidade/{idEntidade}',          ['as' => 'mediador.home.edit.entidade',      'uses' => 'mediador\HomeController@edit_entidade_index']);
    Route::get('/home/entidade/demandaMensal/{idUsuario}',  ['as' => 'mediador.entidade.demandaMensal',  'uses' => 'mediador\HomeController@demandaMensal']);
    Route::get('/home/necessidades/novas',                  ['as' => 'mediador.home.necessidades.novas', 'uses' => 'mediador\HomeController@novas_necessidades']);

    //funções mediador.entidade
    Route::post('/entidade/novo',                       ['as' => 'mediador.entidade.novo',                'uses' => 'mediador\EntidadeController@novo']);
    Route::post('/entidade/editar',                     ['as' => 'mediador.entidade.editar',              'uses' => 'mediador\EntidadeController@editar']);
    Route::get('/entidade/excluir/{idUsuario}',         ['as' => 'mediador.entidade.excluir',             'uses' => 'mediador\EntidadeController@excluir']);
    Route::post('/entidade/novaDemanda/',               ['as' => 'mediador.entidade.novaDemanda',         'uses' => 'mediador\EntidadeController@novaDemanda']);
    Route::post('/entidade/demanda/novoProduto',        ['as' => 'mediador.entidade.demanda.novoProduto', 'uses' => 'mediador\EntidadeController@cadastrarProdutoDemanda']);
    Route::get('/entidade/demanda/excluirProduto/{idEntidade}/{idProduto}', ['as' => 'mediador.entidade.demanda.excluirProduto', 'uses' => 'mediador\EntidadeController@excluirProduto']);

    //funções mediador.pedido
    Route::get('/pedido/aprovar/{idPedido}',            ['as' => 'mediador.pedido.aprovar',              'uses' => 'mediador\EntidadeController@aprovarPedido']);
    Route::get('/pedido/desaprovar/{idPedido}',         ['as' => 'mediador.pedido.desaprovar',           'uses' => 'mediador\EntidadeController@desaprovarPedido']);
    Route::get('/pedido/excluir/{idPedido}',            ['as' => 'mediador.pedido.excluir',              'uses' => 'mediador\EntidadeController@excluirPedido']);
});