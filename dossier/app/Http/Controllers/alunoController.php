<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class alunoController extends Controller  {

    /**
     * Função para a tela inicial do aluno
     *
     * @param Request $request
     * @return view
     */
    public function arquivos(Request $request){

        //valida o login do usuario
        if(Controller::logado($request)){
            //controle de qual nav será usada
            $dados['nav'] = Controller::nav();

            return view('aluno/home', $dados);
        }else{
            return redirect()->back();
        }
    }

} 