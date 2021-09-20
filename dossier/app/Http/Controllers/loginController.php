<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller  {

    /**
     * Controller da tela de login
     *
     * @param Request $request - valores pegos via get
     * @return view - a visualização do sistema
     */
    public function login(Request $request){
        $get = $request->all();

        $dados=[
            'erro' => $get['erro'] ?? '',
            'email' => $get['email'] ?? '',
            'check' => (isset($get['check']) && $get['check'] == 1 ? 'checked' : '')
        ];

        return view('deslogado/login', $dados);
    }

    /**
     * Controller da tela de recuperação de senha
     *
     * @return view - a visualização do sistema
     */
    public function recuperarSenha(){
        return view('deslogado/recuperarSenha');
    }

    /**
     * Função para logar no sistema
     *
     * @param Request $request - dados recebidos via post
     * @return void - redireciona o usuario
     */
    public function logar(Request $request){
        $dados = $request->all();
        
        $email = $dados['email'];
        $senha = $dados['senha'];
        $check = (isset($dados['check']) && $dados['check'] == 'on' ? true : false);

        if($email == "admin@sistema" && $senha == "123"){
            //fazer redirecionamento para a pagina de logado
            return redirect('/secretario//');
        }else{
            echo 'erro';
            return redirect("/?erro=invalido&email=".$email."&check=".$check);
        }
    }

} 