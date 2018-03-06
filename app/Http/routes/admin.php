<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 21:27
 */

Route::group(['middleware' => ['web', 'checaPermissao:admin'] ,'prefix' => 'painel/admin'], function () {

    Route::get('/', 'PanelController@homeAdmin');
    Route::get('/home',     ['as' => 'admin.home',      'uses' => 'Admin\HomeController@home']);
    //Route::get('/perfil',   ['as' => 'admin.perfil',    'uses' => 'PanelController@perfilAdmin']);
});