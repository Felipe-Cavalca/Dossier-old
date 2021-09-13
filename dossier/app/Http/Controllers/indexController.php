<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class indexController extends Controller  {
    
    public function index(){
        $dados = [
            'dono' => 'felipe',
            'titulo' => 'index',
            'nomes' => [
                'pessoa001', 'pessoa002', 'pessoa003', 'pessoa004', 'pessoa005'
            ]
        ];


        return view('index', $dados);
    }
}