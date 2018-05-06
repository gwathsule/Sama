<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 06/05/2018
 * Time: 13:46
 */

namespace App\Http\Controllers\Doador;


use App\Http\Controllers\Controller;
use App\Http\Models\Doadores\DoadorRepository;
use Illuminate\Http\Request;

class DoacaoController extends Controller
{
    protected $doadorDB;
    protected $request;

    /**
     * HomeController constructor.
     */
    public function __construct(Request $request, DoadorRepository $doadorDB)
    {
        $this->middleware('auth');
        $this->middleware('verificaFuncao');

        $this->request = $request;
        $this->doadorDB = $doadorDB;
    }

    public function novo(){
        dd($this->request);
    }

}