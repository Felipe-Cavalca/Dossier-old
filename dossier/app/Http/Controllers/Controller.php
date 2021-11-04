<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function nav(){
        return 'topo';
    }

    public static function pr($data){
        echo "<pre>" . print_r($data, true) . "</pre>";
    }

    /**
     * Desloga o usuario
     *
     * @return void
     */
    public static function deslogar(){
        echo 'Você não está logado';
        die();
    }
    
    /**
     * Valida se um usuario está logado
     *
     * @param Request $request
     * @return void
     */
    public static function logado($request){
        $usuarioLogado = $request->session()->get('usuario');
        //verifica se existe um usuario logado
        if(empty($usuarioLogado)){
            return false;
        }else{
            return true;
        }
    }
}
