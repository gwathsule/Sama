<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 21:28
 */
Route::group(['middleware' => ['web', 'checaPermissao:rotary'] ,'prefix' => 'painel/rotary'], function () {

    Route::get('/', 'PanelController@homeRotary');
    Route::get('/home',     ['as' => 'rotary.home',      'uses' => 'Rotary\HomeController@home']);
    //Route::get('/perfil',   ['as' => 'admin.perfil',    'uses' => 'PanelController@perfilAdmin']);
});