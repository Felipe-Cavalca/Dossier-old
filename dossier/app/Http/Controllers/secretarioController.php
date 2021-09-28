<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class secretarioController extends Controller  {

    public function arquivos(Request $request){
        //controle de qual nav será usada
        $dados['nav'] = Controller::nav();

        return view('secretario/home', $dados);
    }

}