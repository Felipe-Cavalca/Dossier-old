<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class secretarioController extends Controller  {

    public function arquivos(Request $request){
        $get = $request->all();

        //controle de qual nav será usada
        $dados['nav'] = (isset($get['nav']) ? $get['nav'] : '');

        return view('secretario/home', $dados);
    }

} 