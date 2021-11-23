<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Secretario;
use App\Models\usuarioTipo;
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

    /**
     * Função da view de editar um usuario
     *
     * @param Request $request
     * @return void
     */
    public function usuarioEdit(Request $request){
        //valida se o usuario está logado
        if(Controller::logado($request)){
            //dados do get
            $dados = $request->all();
    
            //lista o usuario
            $usuarioModel = new Usuario();
            $retorno['usuario'] = $usuarioModel->where([
                'usuario.id' => $dados['id']
            ])->first();

            //valida o tipo
            $usuarioTipoModel = new UsuarioTipo();
            $retorno['usuario']['tipo'] = $usuarioTipoModel->where([
                'usuario_id' => $retorno['usuario']['id']
            ])->get();

            foreach ($retorno['usuario']['tipo'] as $tipo){
                if($tipo['tipo'] == "Aluno"){
                    $alunoModel = new Aluno();
                    $retorno['usuario']['aluno'] = $alunoModel::where([
                        'id' =>  $tipo['relacionamento_id']
                    ])->first();
                }else if($tipo['tipo'] == "Professor"){
                    $professorModel = new Professor();
                    $retorno['usuario']['professor'] = $professorModel::where([
                        'id' =>  $tipo['relacionamento_id']
                    ])->first();
                }else if($tipo['tipo'] == "Secretario"){
                    $secretarioModel = new Secretario();
                    $retorno['usuario']['secretario'] = $secretarioModel::where([
                        'id' =>  $tipo['relacionamento_id']
                    ])->first();
                }
            }
            
            //controle de qual nav será usada
            $retorno['nav'] = Controller::nav();
            //zera a msg
            $retorno['msg']['erro'] = '';
            $retorno['msg']['aluno'] = '';
            // Controller::pr($retorno);
            return view('cadastro/usuarioEdit', $retorno);
        }else{
            return redirect()->back();
        }
    }

}