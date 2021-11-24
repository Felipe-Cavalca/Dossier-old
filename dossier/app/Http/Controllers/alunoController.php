<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class alunoController extends Controller  {

    public function home(Request $request){
        //valida o login do usuario
        if(Controller::logado($request)){

            return view('aluno/home');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Função para a tela inicial do aluno
     *
     * @param Request $request
     * @return view
     */
    public function arquivos(Request $request){

        //valida o login do usuario
        if(Controller::logado($request)){

            return view('aluno/arquivos');
        }else{
            return redirect()->back();
        }
    }

    public function armazenamento(Request $request){
        //valida o login do usuario
        if(Controller::logado($request)){

            return view('aluno/armazenamento');
        }else{
            return redirect()->back();
        }
    }

    public function grupos(Request $request){
        //valida o login do usuario
        if(Controller::logado($request)){

            return view('aluno/grupos');
        }else{
            return redirect()->back();
        }
    }
} 