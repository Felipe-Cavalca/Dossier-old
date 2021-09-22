<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class arquivoController extends Controller  {

    public function listar(Request $request){

        return view('modules/arquivos/arquivos');
    }

} 