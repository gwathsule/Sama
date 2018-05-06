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
        try {
            $validator = $this->doadorDB->validarNovaDoacao($this->request);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $this->doadorDB->novaDoacao($this->request);

            return back()->with('success', 'Doação registrada, entraremos em contato com você para valida-la. Obrigado por ajudar :)');
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

}