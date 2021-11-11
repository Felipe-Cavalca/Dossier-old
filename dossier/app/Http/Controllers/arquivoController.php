<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use App\Models\Arquivo;
use App\Models\UsuarioArquivo;

class arquivoController extends Controller  {


    /**
     * Função para listas os arquivos do usuario
     *
     * @param Request $request
     * @return void
     */
    public function listar(Request $request){

        //valida se o usuario está logado
        if(Controller::logado($request)){
            //chama o modelo do usuario
            // $usuarioArquivoModel = new UsuarioArquivo(); //usado para compartilhamento
            $arquivoModel = new Arquivo();
            
            //captura dados do usuario logado e inicializa as variaveis
            $usuarioLogado = $request->session()->get('usuario');
            $arquivos = [];
            $retorno = [];

            //caso esteja listando de uma pasta
            if(isset($request['pasta']) && $request['pasta'] != 0){
                //captura o cainho atual da sessão
                $caminhoAtual = $request->session()->get('caminho');

                //captura a pasta e os arquivos
                $pasta = $arquivoModel::where('id', $request['pasta'])->get();
                $arquivos = $arquivoModel::where([
                    ['caminho', 'LIKE', $pasta[0]['caminho'].'%'],
                    ['pai','=', $pasta[0]['id']]
                ])->get();
                $retorno['pastaPai'] = $pasta[0]['pai'];
                    
                //atualiza o caminho atual da sessão
                $caminhoAtual['caminho'] = $pasta[0]['caminho'];
                $caminhoAtual['pai'] = $pasta[0]['id'];
                $request->session()->put('caminho', $caminhoAtual);

                //retorna a pasta pai
                // Controller::pr($pasta);

                //apaga a pasta da posição 0 pois é dele onde estamos dentro
                // unset($arquivos[0]);
            }else{
                //caso seja da raiz

                //define o caminho para a raiz
                $caminho = [
                    'caminho' => '/arquivos/'.$usuarioLogado['email'].'/'
                ];
                $request->session()->put('caminho', $caminho);

                //lista os arquivos e pastas da raiz
                $arquivos = $arquivoModel::where([
                                'pai' => 0,
                                'usuario_id' => $usuarioLogado['id']
                            ])->get();

            }

            //monta o que será retornado
            $retorno['msg'] = $request->session()->get('msg');
            $retorno['arquivos'] = $arquivos;
            
            //retorna a view
            return view('modules/arquivos/arquivos', $retorno);
        }else{
            //caso o usuario não esteja logado
            Controller::pr("Você não está logado");    
        }
    }

    /**
     * Faz o upload de arquivos
     *
     * @param Request $request
     * @return redirect
     */
    public function upload(Request $request){
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('arquivo') && $request->file('arquivo')->isValid() && Controller::logado($request)) {
            //captura os dados do usuario logado
            $usuarioLogado = $request->session()->get('usuario');
            
            // Define um nome aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->arquivo->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            //captura os dados do usuario logado
            $caminhoAtual = $request->session()->get('caminho');

            //define o caminho
            $path = $caminhoAtual['caminho'];
    
            // Faz o upload:
            $upload = $request->arquivo->storeAs($path, $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/arquivos/nomedinamicoarquivo.extensao
            
            // Verifica se deu certo o upload (Redireciona de volta)
            if ($upload){
                //chama o modelo do arquivo e do usuario arquivo
                $arquivoModel = new Arquivo();
                $usuarioArquivoModel = new UsuarioArquivo();
                $arquivoModel->id = null;
                $usuarioArquivoModel->id = null;

                //salva os dados do arquivo
                $arquivoModel->nome = $request->arquivo->getClientOriginalName();
                $arquivoModel->usuario_id = $usuarioLogado['id'];
                $arquivoModel->tipo = "arquivo";
                $arquivoModel->caminho = $path.$nameFile;
                $arquivoModel->pai = isset($caminhoAtual['pai']) ? $caminhoAtual['pai'] : 0;
                $arquivoModel->save();

                //salva os dados do usuarioArquivo
                $usuarioArquivoModel->usuario_id = $usuarioLogado['id'];
                $usuarioArquivoModel->arquivo_id = $arquivoModel->id;
                $usuarioArquivoModel->save();


                $request->session()->flash('msg', ['sucesso' => 'upload concluido']);
            }else{
                $request->session()->flash('msg', ['erro' => 'não foi possivel fazer o upload']);
            }
        }else{
            $request->session()->flash('msg', ['erro' => 'não foi possivel validar o login']);
        }

        return redirect()->back();
    }

    /**
     * Função para fazer o download do arquivo
     *
     * @param Request $request
     * @return void
     */
    public function download(Request $request){
        //captura os dados da request e salva na variavel dados
        $dados = $request->all();
        
        // Verifica se informou o arquivo e se é válido
        if (!empty($dados['id']) && Controller::logado($request)) {
            //captura os dados do usuario logado
            $usuarioLogado = $request->session()->get('usuario');

            //instancia o modelo
            $usuarioArquivoModel = new UsuarioArquivo();

            //verificando se o usuario é dono do arquivo
            $arquivo = $usuarioArquivoModel::where([
                'usuario_id' => $usuarioLogado['id'],
                'arquivo_id' => $dados['id']
            ])->first();

            if(!empty($arquivo)){
                //pegando dados do arquivo
                $arquivoModel = new Arquivo();
                $arquivo = $arquivoModel::where([
                    'id' => $dados['id']
                ])->first();
                
                return Storage::download($arquivo['caminho'], $arquivo['nome']);
            }else{
                echo 'vazio';
                return redirect()->back();
            }

        }else{
            echo 'negado';
            return redirect()->back();
        }
    } 

    public function criarPasta(Request $request){

        if (Controller::logado($request)) {
            $dados = $request->all();
            
            $usuarioLogado = $request->session()->get('usuario');
            $caminhoAtual = $request->session()->get('caminho');
    
            //chama o modelo do arquivo e do usuario arquivo
            $arquivoModel = new Arquivo();
            $usuarioArquivoModel = new UsuarioArquivo();
            $arquivoModel->id = null;
            $usuarioArquivoModel->id = null;
            
            $arquivoModel->nome = $dados['nome'];
            $arquivoModel->usuario_id = $usuarioLogado['id'];
            $arquivoModel->caminho = $caminhoAtual['caminho'].$dados['nome'].'/';
            $arquivoModel->pai = isset($caminhoAtual['pai']) ? $caminhoAtual['pai'] : 0;
            $arquivoModel->tipo = "pasta";

            //salva a sessão
            $arquivoModel->save();
            
            $request->session()->flash('msg', ['sucesso' => 'upload concluido']);
            return redirect()->back();
        }else{
            $request->session()->flash('msg', ['erro' => 'não foi possivel validar o login']);
        }
    }

}