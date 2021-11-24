<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arquivo;

class alunoController extends Controller
{

    public function home(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {

            return view('aluno/home');
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

            $retorno = array_merge($this->getArquivos($request), $retorno);

            //monta o que será retornado
            $retorno['msg'] = $request->session()->get('msg');

            return view('aluno/arquivos', $retorno);
        } else {
            return redirect()->back();
        }
    }

    public function armazenamento(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {

            return view('aluno/armazenamento');
        } else {
            return redirect()->back();
        }
    }

    public function grupos(Request $request)
    {
        //valida o login do usuario
        if (Controller::logado($request)) {

            return view('aluno/grupos');
        } else {
            return redirect()->back();
        }
    }

    public function getArquivos(Request $request)
    {
        //carrega o modelo do arquivo
        $arquivoModel = new Arquivo();

        //captura dados do usuario logado e inicializa as variaveis
        $usuarioLogado = $request->session()->get('usuario');
        $arquivos = [];
        $retorno = [];

        //caso esteja listando de uma pasta
        if (isset($request['pasta']) && $request['pasta'] != 0) {
            //captura o cainho atual da sessão
            $caminhoAtual = $request->session()->get('caminho');

            //captura a pasta e os arquivos
            $pasta = $arquivoModel::where('id', $request['pasta'])->get();
            $arquivos = $arquivoModel::where([
                ['caminho', 'LIKE', $pasta[0]['caminho'] . '%'],
                ['pai', '=', $pasta[0]['id']]
            ])->get();
            $retorno['pastaPai'] = $pasta[0]['pai'];

            //atualiza o caminho atual da sessão
            $caminhoAtual['caminho'] = $pasta[0]['caminho'];
            $caminhoAtual['pai'] = $pasta[0]['id'];
            $request->session()->put('caminho', $caminhoAtual);
        } else {
            //caso seja da raiz
            $caminho = [
                'caminho' => '/arquivos/' . $usuarioLogado['email'] . '/'
            ];
            $request->session()->put('caminho', $caminho);

            //lista os arquivos e pastas da raiz
            $arquivos = $arquivoModel::where([
                'pai' => 0,
                'usuario_id' => $usuarioLogado['id']
            ])->get();
        }

        //monta o que será retornado
        $retorno['arquivos'] = $arquivos;

        //retorna a view
        return $retorno;
    }
}
