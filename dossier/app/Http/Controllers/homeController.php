<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class homeController extends Controller  {

    public function home(){
        $dadosView =  [
            'nome' => 'luca',
            'sobrenome' => 'rodrigues'
        ];

        return view('home', $dadosView);
    }   

} 