<?php
/**
 * Created by PhpStorm.
 * User: Lynn
 * Date: 02/05/2018
 * Time: 19:53
 */

namespace App\Http\Controllers\Doador;


use App\Http\Controllers\Controller;
use App\Http\Models\Doadores\DoadorRepository;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    protected $doadorDB;
    protected $request;

    /**
     * PublicController constructor.
     */
    public function __construct(Request $request, DoadorRepository $doadorDB)
    {
        $this->doadorDB = $doadorDB;
        $this->request = $request;
    }

    public function cadastro(){
        try {
            if(strcmp($this->request->tipoPessoa, 'pessoaFisica') == 0){
                $validator = $this->doadorDB->validarNovaPessoaFisica($this->request);

                if ($validator->fails()) {
                    return back()
                        ->withErrors($validator)
                        ->withInput();
                }
                $this->doadorDB->novaPessoaFisica($this->request);

                return back()
                    ->with('success', 'Novo doador cadastrado com sucesso! Seja bem vindo a nossa família! ');

            } else{
                $validator = $this->doadorDB->validarNovaPessoaJuridica($this->request);

                if ($validator->fails()) {
                    return back()
                        ->withErrors($validator)
                        ->withInput();
                }
                $this->doadorDB->novaPessoaJuridica($this->request);

                return back()
                    ->with('success', 'Nova empresa cadastrada com sucesso! Seja bem vindo a nossa família! ');
            }
        }catch (Exception $e){
            return back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }
}