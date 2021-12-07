<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\arquivoController;
use App\Models\Professor;
use App\Models\UsuarioTipo;

class secretarioController extends Controller
{

    /**
     * Função para trazer a home do secretario
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
            
            return view('secretario/home', $retorno);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Função para a tela inicial do aluno
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

            return view('secretario/arquivos', $retorno);
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

            return view('secretario/armazenamento', $retorno);
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

            return view('secretario/grupos', $retorno);
        } else {
            return redirect()->back();
        }
    }

    public function professores(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {

            //pega o nome do usuario
            $usuarioLogado = $request->session()->get('usuario');
            $retorno['nomeUsuario'] = $usuarioLogado['nome'];

            $usuarioTipoModel = new UsuarioTipo();
            $retorno['professores'] = $usuarioTipoModel
                ->join('usuario', 'usuario.id', '=', 'usuario_tipo.usuario_id')
                ->join('professor', 'professor.id', '=', 'usuario_tipo.relacionamento_id')
                ->where([
                    'usuario_tipo.tipo' => 'Professor'
                ])
                ->get();

            return view('secretario/professores', $retorno);
        } else {
            return redirect()->back();
        }
    }

    public function alunos(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {

            //pega o nome do usuario
            $usuarioLogado = $request->session()->get('usuario');
            $retorno['nomeUsuario'] = $usuarioLogado['nome'];

            return view('secretario/alunos', $retorno);
        } else {
            return redirect()->back();
        }
    }

    public function turmas(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {

            //pega o nome do usuario
            $usuarioLogado = $request->session()->get('usuario');
            $retorno['nomeUsuario'] = $usuarioLogado['nome'];

            return view('secretario/turmas', $retorno);
        } else {
            return redirect()->back();
        }
    }
}
