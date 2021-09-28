<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class cadastroController extends Controller  {

    public function cadastroAluno(Request $request){
        //controle de qual nav será usada
        $dados['nav'] = Controller::nav();

        return view('cadastro/aluno', $dados);
    }

} 