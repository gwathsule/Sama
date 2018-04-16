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
    //Route::get('/perfil',   ['as' => 'admin.perfil',    'uses' => 'PanelController@perfilAdmin']);
});