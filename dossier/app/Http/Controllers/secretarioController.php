<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class secretarioController extends Controller  {

    /**
     * Função para carregar a view de arquivos do secretario
     *
     * @param Request $request
     * @return view
     */
    public function arquivos(Request $request){

        if(Controller::logado($request)){
            //controle de qual nav será usada
            $dados['nav'] = Controller::nav();

            return view('secretario/home', $dados);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Função para listar todos os usuario
     *
     * @param Request $request
     * @return view
     */
    public function usuarioList(Request $request){

        if(Controller::logado($request)){
            //controle de qual nav será usada
            $dados['nav'] = Controller::nav();
            
            $usuarioModel = new Usuario();
            
            $dados['usuarios'] = $usuarioModel->join('usuario_tipo', 'usuario_tipo.id', '=', 'usuario.id')->get();
            
            return view('secretario/usuarioList', $dados);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Função para excluir um usuario
     *
     * @param Request $request
     * @return void
     */
    public function usuarioDell(Request $request){
        //valida se o usuario está logado
        if(Controller::logado($request)){
            
            //captura os dados da request e salva na variavel dados
            $dados = $request->all();

            $usuarioModel = new Usuario();

            //validando se o usuario existe
            $usuario = $usuarioModel::where([
                'id' => $dados['id'],
            ])->first();

            Controller::pr($usuario);

            $usuario->delete();
        }
        return redirect()->back();
    }

}