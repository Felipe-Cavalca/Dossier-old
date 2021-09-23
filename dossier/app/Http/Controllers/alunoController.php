<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class alunoController extends Controller  {

    public function arquivos(Request $request){
        $get = $request->all();

        //controle de qual nav será usada
        $dados['nav'] = $get['nav'] ?? "";

        return view('aluno/home', $dados);
    }

} 