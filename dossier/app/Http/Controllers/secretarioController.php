<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class secretarioController extends Controller  {

    /**
     * Função para carregar a view de arquivos do secretario
     *
     * @param Request $request
     * @return view
     */
    public function arquivos(Request $request){

        if(Controller::logado($request)){
            //controle de qual nav será usada
            $dados['nav'] = Controller::nav();

            return view('secretario/home', $dados);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Função para listar todos os usuario
     *
     * @param Request $request
     * @return view
     */
    public function usuarioList(Request $request){

        if(Controller::logado($request)){
            //controle de qual nav será usada
            $dados['nav'] = Controller::nav();
            
            $usuarioModel = new Usuario();
            
            $dados['usuarios'] = $usuarioModel->all();
            
            return view('secretario/usuarioList', $dados);
        }else{
            return redirect()->back();
        }
    }

}