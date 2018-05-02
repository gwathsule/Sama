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

Route::get('/doar', function () {
    return view('doar');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/register', function () {
    return back();
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'PanelController@define_painel');
    Route::get('/painel', 'PanelController@define_painel');
    Route::get('/router-painel', 'PanelController@define_painel');

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');
});