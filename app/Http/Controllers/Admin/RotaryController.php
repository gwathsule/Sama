<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 12/03/2018
 * Time: 22:02
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RotaryController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
    }

    public function novo(){
        dd($this->request->nome);
    }

    public function editar(){
        dd($this->request);
    }

    public function listar(){
        dd($this->request);
    }
}