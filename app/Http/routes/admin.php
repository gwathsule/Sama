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
    Route::get('/home/new',      ['as' => 'admin.home.new',       'uses' => 'Admin\HomeController@new_index']);
    Route::get('/home/edit',     ['as' => 'admin.home.edit',      'uses' => 'Admin\HomeController@edit_index']);
    Route::get('/home/list',     ['as' => 'admin.home.list',      'uses' => 'Admin\HomeController@list_index']);
    //Route::get('/perfil',   ['as' => 'admin.perfil',    'uses' => 'PanelController@perfilAdmin']);
});