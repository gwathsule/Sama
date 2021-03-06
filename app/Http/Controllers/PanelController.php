<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 03/03/2018
 * Time: 18:25
 */

namespace App\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');
    }

    /**
     * Verifica o tipo do usuário logado e direciona para o painel específico
     * @return mixed
     */
    public function define_painel()
    {
        if (Auth::check()) 
        {
            switch (Auth::user()->tipo)
            {
                case 'Admin':
                    return redirect(route('admin.home'));
                    break;
                case 'Doador':
                    return redirect(route('doador.home'));
                    break;
                case 'Entidade':
                    return redirect(route('entidade.home'));
                    break;
                case 'Mediador':
                    return redirect(route('mediador.home'));
                    break;
                default:
                    return redirect('/logout');
                    break;
            }
        }
        else
            return redirect('/logout');
    }

    public function homeAdmin(){
        return redirect(route('admin.home'));
    }

    public function homeDoador(){
        return redirect(route('doador.home'));
    }

    public function homeEntidade(){
        return redirect(route('entidade.home'));
    }

    public function homeMediador(){
        return redirect(route('mediador.home'));
    }
}