<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Secretario;
use App\Models\UsuarioTipo;
use App\Models\Aluno;
use App\Models\Professor;

class cadastroController extends Controller  {

    /**
     * Função do cadastro de aluno
     *
     * @param Request $request
     * @return void
     */
    public function cadastroAluno(Request $request){
        //cptura os dados da request e salva na variavel dados
        $dados = $request->all();
        
        //valida se veio algum dados via post
        if($dados){
            //chama o modelo do usuario
            $usuarioModel = new Usuario();
            $alunoModel = new Aluno();
            $usuarioTipoModel = new UsuarioTipo();
            
            //faz as validações de dados

            //verifica se a senha é igual ao confirma senha
            if($dados['senha'] != $dados['confirmaSenha']){
                $dados['msg']['erro'] = 'senha';
            }

            //verifica se o email já existe
            $usuario = $usuarioModel::where('email', $dados['email'])->get();
            if(count($usuario) != 0){
                $dados['msg']['erro'] = 'email';
            }

            //caso não haja erro cadastra no banco
            if(!isset($dados['msg']['erro'])){
                //cadastro o usuario na base de dados
                //do usuario
                $usuarioModel->nome = $dados['nome'];
                $usuarioModel->email = $dados['email'];
                $usuarioModel->senha = $dados['senha'];
                $usuarioModel->cpf = $dados['cpf'];
                $usuarioModel->telefone = $dados['telefone'];
                $usuarioModel->nascimento = $dados['nascimento'];
                $usuarioModel->ativo = true;
                $usuarioModel->save();
                
                //do aluno
                $alunoModel->ra = $dados['ra'];
                $alunoModel->save();

                //usuario tipo
                $usuarioTipoModel->usuario_id = $usuarioModel->id;
                $usuarioTipoModel->relacionamento_id = $alunoModel->id;
                $usuarioTipoModel->tipo = "Aluno";
                $usuarioTipoModel->ativo = true;
                $usuarioTipoModel->save();
 
                //define o erro como sucesso
                $dados['msg']['erro'] = 'sucesso';
                $dados['msg']['aluno'] = $dados['nome'];
            }

        }else{
            //seta os dados para a view
            $dados['msg']['erro'] = '';
            $dados['msg']['aluno'] = '';
            //do usuario
            $dados['nome'] = '';
            $dados['email'] = '';
            $dados['cpf'] = '';
            $dados['telefone'] = '';
            $dados['nascimento'] = '';
            //do aluno
            $dados['ra'] = '';
        }

        //controle de qual nav será usada
        $dados['nav'] = Controller::nav();

        //retorna  a view
        return view('cadastro/aluno', $dados);
    }

    /**
     * Função do cadastro de secretario
     *
     * @param Request $request
     * @return view
     */
    public function cadastroSecretario(Request $request){
        //cptura os dados da request e salva na variavel dados
        $dados = $request->all();
        
        //valida se veio algum dados via post
        if($dados){
            //chama o modelo do usuario
            $usuarioModel = new Usuario();
            $secretarioModel = new Secretario();
            $usuarioTipoModel = new UsuarioTipo();
            
            //faz as validações de dados

            //verifica se a senha é igual ao confirma senha
            if($dados['senha'] != $dados['confirmaSenha']){
                $dados['msg']['erro'] = 'senha';
            }

            //verifica se o email já existe
            $usuario = $usuarioModel::where('email', $dados['email'])->get();
            if(count($usuario) != 0){
                $dados['msg']['erro'] = 'email';
            }

            //caso não haja erro cadastra no banco
            if(!isset($dados['msg']['erro'])){
                //cadastro o usuario na base de dados
                //do usuario
                $usuarioModel->nome = $dados['nome'];
                $usuarioModel->email = $dados['email'];
                $usuarioModel->senha = $dados['senha'];
                $usuarioModel->cpf = $dados['cpf'];
                $usuarioModel->telefone = $dados['telefone'];
                $usuarioModel->nascimento = $dados['nascimento'];
                $usuarioModel->ativo = true;
                $usuarioModel->save();
                
                //do secretario
                $secretarioModel->turno = $dados['turno'];
                $secretarioModel->save();

                //usuario tipo
                $usuarioTipoModel->usuario_id = $usuarioModel->id;
                $usuarioTipoModel->relacionamento_id = $secretarioModel->id;
                $usuarioTipoModel->tipo = "Secretario";
                $usuarioTipoModel->ativo = true;
                $usuarioTipoModel->save();
 
                //define o erro como sucesso
                $dados['msg']['erro'] = 'sucesso';
                $dados['msg']['secretario'] = $dados['nome'];
            }

        }else{
            //seta os dados para a view
            $dados['msg']['erro'] = '';
            $dados['msg']['secretario'] = '';
            //do usuario
            $dados['nome'] = '';
            $dados['email'] = '';
            $dados['cpf'] = '';
            $dados['telefone'] = '';
            $dados['nascimento'] = '';
            //do secretario
            $dados['turno'] = '';
        }

        //controle de qual nav será usada
        $dados['nav'] = Controller::nav();

        //retorna  a view
        return view('cadastro/secretario', $dados);
    }

    /**
     * Função do cadastro do professot
     *
     * @param Request $request
     * @return view
     */
    public function cadastroProfessor(Request $request){
        //cptura os dados da request e salva na variavel dados
        $dados = $request->all();
        
        //valida se veio algum dados via post
        if($dados){
            //chama o modelo do usuario
            $usuarioModel = new Usuario();
            $professorModel = new Professor();
            $usuarioTipoModel = new UsuarioTipo();
            
            //faz as validações de dados

            //verifica se a senha é igual ao confirma senha
            if($dados['senha'] != $dados['confirmaSenha']){
                $dados['msg']['erro'] = 'senha';
            }

            //verifica se o email já existe
            $usuario = $usuarioModel::where('email', $dados['email'])->get();
            if(count($usuario) != 0){
                $dados['msg']['erro'] = 'email';
            }

            //caso não haja erro cadastra no banco
            if(!isset($dados['msg']['erro'])){
                //cadastro o usuario na base de dados
                //do usuario
                $usuarioModel->nome = $dados['nome'];
                $usuarioModel->email = $dados['email'];
                $usuarioModel->senha = $dados['senha'];
                $usuarioModel->cpf = $dados['cpf'];
                $usuarioModel->telefone = $dados['telefone'];
                $usuarioModel->nascimento = $dados['nascimento'];
                $usuarioModel->ativo = true;
                $usuarioModel->save();
                
                //do professor
                $professorModel->rg = $dados['rg'];
                $professorModel->save();

                //usuario tipo
                $usuarioTipoModel->usuario_id = $usuarioModel->id;
                $usuarioTipoModel->relacionamento_id = $professorModel->id;
                $usuarioTipoModel->tipo = "Professor";
                $usuarioTipoModel->ativo = true;
                $usuarioTipoModel->save();
 
                //define o erro como sucesso
                $dados['msg']['erro'] = 'sucesso';
                $dados['msg']['professor'] = $dados['nome'];
            }

        }else{
            //seta os dados para a view
            $dados['msg']['erro'] = '';
            $dados['msg']['professor'] = '';
            //do usuario
            $dados['nome'] = '';
            $dados['email'] = '';
            $dados['cpf'] = '';
            $dados['telefone'] = '';
            $dados['nascimento'] = '';
            //do professor
            $dados['rg'] = '';
        }

        //controle de qual nav será usada
        $dados['nav'] = Controller::nav();

        //retorna  a view
        return view('cadastro/professor', $dados);
    }
} 