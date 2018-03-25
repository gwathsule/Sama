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
    Route::get('/home/new/entidade',              ['as' => 'rotary.home.new.entidade',       'uses' => 'Rotary\HomeController@new_entidade_index']);
    Route::get('/home/list/entidade',             ['as' => 'rotary.home.list.entidade',      'uses' => 'Rotary\HomeController@list_entidade_index']);
    Route::get('/home/edit/entidade/{idUsuario}', ['as' => 'rotary.home.edit.entidade',      'uses' => 'Rotary\HomeController@edit_entidade_index']);

    //funções admin.entidade
    Route::post('/entidade/novo',                 ['as' => 'rotary.entidade.novo',           'uses' => 'Rotary\EntidadeController@novo']);
    Route::post('/entidade/editar',               ['as' => 'rotary.entidade.editar',         'uses' => 'Rotary\EntidadeController@editar']);
    Route::get('/entidade/excluir/{idUsuario}',   ['as' => 'rotary.entidade.excluir',        'uses' => 'Rotary\EntidadeController@excluir']);
});