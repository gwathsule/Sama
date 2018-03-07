<?php

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/03/2018
 * Time: 20:05
 */
namespace App\Http\Controllers\Doador;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
    }

    public function home(){
        dd('home do doador');
    }
}