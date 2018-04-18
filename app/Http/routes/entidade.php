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

    //pages
    Route::get('/home/new/necessidade',  ['as' => 'entidade.home.new.necessidade',  'uses' => 'Entidade\HomeController@new_necessidade_index']);
    Route::get('/home/list/necessidade', ['as' => 'entidade.home.list.necessidade', 'uses' => 'Entidade\HomeController@list_necessidade_index']);
});