<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 21:28
 */
Route::group(['middleware' => ['checaPermissao:rotary'] ,'prefix' => 'painel/rotary'], function () {

    Route::get('/', 'PanelController@homeRotary');
    Route::get('/home',     ['as' => 'rotary.home',      'uses' => 'Rotary\HomeController@home']);

    //pages
    Route::get('/home/new/entidade',                        ['as' => 'rotary.home.new.entidade',       'uses' => 'Rotary\HomeController@new_entidade_index']);
    Route::get('/home/list/entidade',                       ['as' => 'rotary.home.list.entidade',      'uses' => 'Rotary\HomeController@list_entidade_index']);
    Route::get('/home/edit/entidade/{idEntidade}',          ['as' => 'rotary.home.edit.entidade',      'uses' => 'Rotary\HomeController@edit_entidade_index']);
    Route::get('/home/edit/entidade/{idEntidade}',          ['as' => 'rotary.home.edit.entidade',      'uses' => 'Rotary\HomeController@edit_entidade_index']);
    Route::get('/home/entidade/demandaMensal/{idUsuario}',  ['as' => 'rotary.entidade.demandaMensal',  'uses' => 'Rotary\HomeController@demandaMensal']);
    Route::get('/home/necessidades/novas',                  ['as' => 'rotary.home.necessidades.novas', 'uses' => 'Rotary\HomeController@novas_necessidades']);
    Route::get('/home/doacoes/novas',                       ['as' => 'rotary.home.doacoes.novas',      'uses' => 'Rotary\HomeController@novas_doacoes']);
    Route::get('/home/doacoes/andamento',                   ['as' => 'rotary.home.doacoes.andamento',  'uses' => 'Rotary\HomeController@doacaoes_andamento']);

    //funções rotary.entidade
    Route::post('/entidade/novo',                       ['as' => 'rotary.entidade.novo',                'uses' => 'Rotary\EntidadeController@novo']);
    Route::post('/entidade/editar',                     ['as' => 'rotary.entidade.editar',              'uses' => 'Rotary\EntidadeController@editar']);
    Route::get('/entidade/excluir/{idUsuario}',         ['as' => 'rotary.entidade.excluir',             'uses' => 'Rotary\EntidadeController@excluir']);
    Route::post('/entidade/novaDemanda/',               ['as' => 'rotary.entidade.novaDemanda',         'uses' => 'Rotary\EntidadeController@novaDemanda']);
    Route::post('/entidade/demanda/novoProduto',        ['as' => 'rotary.entidade.demanda.novoProduto', 'uses' => 'Rotary\EntidadeController@cadastrarProdutoDemanda']);
    Route::get('/entidade/demanda/excluirProduto/{idEntidade}/{idProduto}', ['as' => 'rotary.entidade.demanda.excluirProduto', 'uses' => 'Rotary\EntidadeController@excluirProduto']);

    //funções rotary.pedido
    Route::get('/pedido/aprovar/{idPedido}',            ['as' => 'rotary.pedido.aprovar',              'uses' => 'Rotary\EntidadeController@aprovarPedido']);
    Route::get('/pedido/desaprovar/{idPedido}',         ['as' => 'rotary.pedido.desaprovar',           'uses' => 'Rotary\EntidadeController@desaprovarPedido']);
    Route::get('/pedido/excluir/{idPedido}',            ['as' => 'rotary.pedido.excluir',              'uses' => 'Rotary\EntidadeController@excluirPedido']);

    //funções rotary.doacoes
    Route::get('/doacao/aprovar/{idDoacao}',            ['as' => 'rotary.doacao.aprovar',               'uses' => 'Rotary\DoadorController@aprovarDoacao']);
    Route::get('/doacao/excluir/{idDoacao}',            ['as' => 'rotary.doacao.excluir',               'uses' => 'Rotary\DoadorController@excluirDoacao']);
    Route::get('/doacao/marcarComoEstoque/{idDoacao}',  ['as' => 'rotary.doacao.marcarComoEstoque',     'uses' => 'Rotary\DoadorController@marcarComoEstoque']);
    Route::get('/doacao/marcarComoEntregue/{idDoacao}', ['as' => 'rotary.doacao.marcarComoEntregue',    'uses' => 'Rotary\DoadorController@marcarComoEntregue']);
    Route::post('/doacao/getByDoacaoFiltro',            ['as' => 'rotary.doacao.getByDoacaoFiltro',     'uses' => 'Rotary\DoadorController@getByDoacaoFiltro']);

});