<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\arquivoController;

class professorController extends Controller
{

    /**
     * Home do professor
     *
     * @param Request $request
     * @return void
     */
    public function home(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {

            //pega o nome do usuario
            $usuarioLogado = $request->session()->get('usuario');
            $retorno['nomeUsuario'] = $usuarioLogado['nome'];
            
            return view('professor/home', $retorno);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Função para a tela inicial do professor
     *
     * @param Request $request
     * @return view
     */
    public function arquivos(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {
            //inicializa as variaveis
            $retorno = [];

            //pega o nome do usuario
            $usuarioLogado = $request->session()->get('usuario');
            $retorno['nomeUsuario'] = $usuarioLogado['nome'];

            $retorno = array_merge(arquivoController::listar($request), $retorno);

            //monta o que será retornado
            $retorno['msg'] = $request->session()->get('msg');

            return view('professor/arquivos', $retorno);
        } else {
            return redirect()->back();
        }
    }

    public function armazenamento(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {

            //pega o nome do usuario
            $usuarioLogado = $request->session()->get('usuario');
            $retorno['nomeUsuario'] = $usuarioLogado['nome'];

            return view('professor/armazenamento', $retorno);
        } else {
            return redirect()->back();
        }
    }

    public function grupos(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {

            //pega o nome do usuario
            $usuarioLogado = $request->session()->get('usuario');
            $retorno['nomeUsuario'] = $usuarioLogado['nome'];

            return view('professor/grupos', $retorno);
        } else {
            return redirect()->back();
        }
    }
}
