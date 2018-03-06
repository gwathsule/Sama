<?php

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/02/2018
 * Time: 21:53
 */
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/router-painel', 'PanelController@define_painel');
Route::get('/register', function () {
    return back();
});

Route::group(['middleware' => ['web'], 'prefix' => '/'], function () {
    Route::get('/', 'PanelController@define_painel');
    Route::get('/painel', 'PanelController@define_painel');
    Route::get('/router-painel', 'PanelController@define_painel');

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');
});