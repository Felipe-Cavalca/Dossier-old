<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class loginController extends Controller  {

    public function login(){

        //logica do sistema

        return view('deslogado/login');
    }

    public function recuperarSenha(){
        return view('deslogado/recuperarSenha');
    }

} 