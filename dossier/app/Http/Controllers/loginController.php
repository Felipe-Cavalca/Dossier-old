<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\UsuarioTipo;

class loginController extends Controller  {

    /**
     * Controller da tela de login
     *
     * @param Request $request - valores pegos via get
     * @return view - a visualização do sistema
     */
    public function login(Request $request){
        //captura os dados da request e salva na variavel dados
        $dados = $request->all();

        //valida se veio via post
        if(!empty($dados)){
            //chama o modelo do usuario
            $usuarioModel = new Usuario();

            //verificando se o usuario existe
            $usuario = $usuarioModel::where([
                'email' => $dados['email'],
                'senha' => md5($dados['senha']),
                'ativo' => true
            ])->first();

            //caso sim trata os dados
            if(isset($usuario)){
                //salva a sessão
                $request->session()->put('usuario', $usuario);

                //cria o caminho para os arquivos
                $caminho = [
                    'caminho' => '/arquivos/'.$dados['email'].'/',
                    'pai' => 0
                ];
                $request->session()->put('caminho', $caminho);
                // $_SESSION['usuario']['logado'] = (isset($dados['check']) && $dados['check'] == 'on' ? true : false);
                
                //verifica o tipo de usuario
                //atualmente só funciona 1 - necessario modificar
                $usuarioTipoModel = new UsuarioTipo();

                $tipo = $usuarioTipoModel::where([
                    'usuario_id' => $usuario['id'],
                    'ativo' => true
                ])->get();

                if($tipo[0]['tipo'] == 'Secretario'){
                    return redirect('secretario');
                } else if ($tipo[0]['tipo'] == "Aluno"){
                    return redirect('aluno');
                }else{
                    $dados['msg']['erro'] = 'tipo';
                }
                
                //caso não haja nenhum erro define a mensagem de sucesso
                if(!isset($dados['msg']['erro'])){
                    $dados['msg']['erro'] = 'sucesso';
                }
                
            }else{
                //define mensagem de erro
                $dados['msg']['erro'] = 'invalido';
            }
            
            //define o check para marcado ou não
            $dados['check'] = (isset($dados['check']) && $dados['check'] == 'on' ? 'checked' : '');
        }else{
            $dados['email'] = '';
            $dados=[
                'msg' => [
                    'erro' => ''
                ],
                'check' => ''
            ];
            $dados['email'] = '';
        }
        //retorna a view
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

} 