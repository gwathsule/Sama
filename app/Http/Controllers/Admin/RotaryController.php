<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 12/03/2018
 * Time: 22:02
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Rotaries\RotaryRepository;
use Illuminate\Http\Request;

class RotaryController extends Controller
{
    protected $request;
    protected  $rotaryDB;

    public function __construct(Request $request, RotaryRepository $rotaryDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
        $this->request = $request;
        $this->rotaryDB = $rotaryDB;
    }

    public function novo(){;
        $validator = $this->rotaryDB->validarNovo($this->request);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }



        return back()
            ->with('success', 'Usuário Rotary cadastrado com sucesso');
    }

    public function editar(){
        dd($this->request);
    }

    public function listar(){
        dd($this->request);
    }
}