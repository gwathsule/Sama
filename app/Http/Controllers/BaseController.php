<?php
namespace App\Http\Controllers;

use Gate;

class BaseController extends Controller {

    public function __construct() {}

    public function checaPermissao($permissao)
    {
        if ( Gate::denies($permissao) )
            return false;
        return true;
    }
}
