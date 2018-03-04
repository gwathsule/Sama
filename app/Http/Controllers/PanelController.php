<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 03/03/2018
 * Time: 18:25
 */

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function define_painel()
    {
        return view('painel::layout.app');
        /*if (Auth::check()) {

            if (Auth::user()->tipo === 'Admin')
                return redirect(route('admin.home'));

            dd('PAINEL INDEFINIDO, VERIFIQUE!');
        }
        else
            return redirect('/login');*/
    }
}