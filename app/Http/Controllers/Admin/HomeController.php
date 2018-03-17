<?php

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/03/2018
 * Time: 20:05
 */
namespace App\Http\Controllers\Admin;

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
        return view('panel::admin.home');
    }

    public function new_index(){
        return view('panel::admin.rotary.new');
    }

    public function edit_index(){
        return view('panel::admin.rotary.list');
    }

    public function list_index(){
        return view('panel::admin.rotary.edit');
    }
}