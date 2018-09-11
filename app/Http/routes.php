<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/** Route Partial Map
 * Carrega os arquivos de rotas especificados no array '$route_partials'.
====================================================================== */

//ORDER MATTERS!
$route_partials = [
    'admin',
    'doador',
    'rotary',
    'entidade',
    'commons',
    'Init',
];
/** Route Partial Loadup
====================================================================== */
foreach ($route_partials as $partial) {
    $file = __DIR__.'/routes/'.$partial.'.php';
    if ( !file_exists($file) )
    {
        $msg = "Route partial [{$file}] not found!";
        throw new Exception($msg);
    }
    require_once $file;
}
