<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 21:28
 */

Route::post('/doador/cadastro',     ['as' => 'doador.cadastro',      'uses' => 'Doador\PublicController@cadastro']);

Route::group(['middleware' => ['checaPermissao:doador'] ,'prefix' => 'painel/doador'], function () {
    Route::get('/', 'PanelController@homeDoador');
    Route::get('/home',     ['as' => 'doador.home',      'uses' => 'Doador\HomeController@home']);
    
    //rotas doacao
    Route::post('/doacao/novo',     ['as' => 'doador.doacao.novo',      'uses' => 'Doador\DoacaoController@novo']);
});