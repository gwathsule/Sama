<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 17/03/2018
 * Time: 20:32
 */

namespace App\Http\Models\Rotaries;

use Validator;
use Illuminate\Http\Request;

class RotaryRepository
{

    /**
     * RotaryRepository constructor.
     */
    public function __construct()
    {
    }

    public function validarNovo(Request $request){
        return
            $validator = Validator::make($request->all(), [
                'nome' => 'required|max:255',
                'email' => 'required|max:255',
                'cpf' => 'required|max:11|min:11',
                'celular' => 'required|max:11|min:10',
                'password' => 'required|max:60|confirmed',
            ]);
    }

    //nao pode  herdar de user o Rotary e depois que cadastrar tem que rodar uma função pra cadastrar as funções
    public function novo(Request $request){
        Rotary::create([
            'name' => 'Admin',
            'email' => 'admin@sama.com.br',
            'password' => bcrypt('admin'),
            'tipo' => 3,
        ]);
    }
}