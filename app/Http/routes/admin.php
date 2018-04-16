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
    Route::get('/home/new/rotary',              ['as' => 'admin.home.new.rotary',       'uses' => 'Admin\HomeController@new_rotary_index']);
    Route::get('/home/list/rotary',             ['as' => 'admin.home.list.rotary',      'uses' => 'Admin\HomeController@list_rotary_index']);
    Route::get('/home/edit/rotary/{idUsuario}', ['as' => 'admin.home.edit.rotary',      'uses' => 'Admin\HomeController@edit_rotary_index']);

    //funções admin.rotary
    Route::post('/rotary/novo',                 ['as' => 'admin.rotary.novo',           'uses' => 'Admin\RotaryController@novo']);
    Route::post('/rotary/editar',               ['as' => 'admin.rotary.editar',         'uses' => 'Admin\RotaryController@editar']);
    Route::get('/rotary/excluir/{idUsuario}',   ['as' => 'admin.rotary.excluir',        'uses' => 'Admin\RotaryController@excluir']);

});