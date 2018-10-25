<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 21:27
 */

Route::group(['middleware' => ['checaPermissao:admin'] ,'prefix' => 'painel/admin'], function () {

    Route::get('/', 'PanelController@homeAdmin');
    Route::get('/home',                         ['as' => 'admin.home',                  'uses' => 'Admin\HomeController@home']);
    //pages
    Route::get('/home/new/mediador',              ['as' => 'admin.home.new.mediador',       'uses' => 'Admin\HomeController@new_mediador_index']);
    Route::get('/home/list/mediador',             ['as' => 'admin.home.list.mediador',      'uses' => 'Admin\HomeController@list_mediador_index']);
    Route::get('/home/edit/mediador/{idUsuario}', ['as' => 'admin.home.edit.mediador',      'uses' => 'Admin\HomeController@edit_mediador_index']);

    //funções admin.mediador
    Route::post('/mediador/novo',                 ['as' => 'admin.mediador.novo',           'uses' => 'Admin\MediadorController@novo']);
    Route::post('/mediador/editar',               ['as' => 'admin.mediador.editar',         'uses' => 'Admin\MediadorController@editar']);
    Route::get('/mediador/excluir/{idUsuario}',   ['as' => 'admin.mediador.excluir',        'uses' => 'Admin\MediadorController@excluir']);

});