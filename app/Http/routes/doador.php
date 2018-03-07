<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 21:28
 */

Route::group(['middleware' => ['web', 'checaPermissao:doador'] ,'prefix' => 'painel/doador'], function () {

    Route::get('/', 'PanelController@homeDoador');
    Route::get('/home',     ['as' => 'doador.home',      'uses' => 'Doador\HomeController@home']);
    //Route::get('/perfil',   ['as' => 'admin.perfil',    'uses' => 'PanelController@perfilAdmin']);
});