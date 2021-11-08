<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use App\Models\Arquivo;
use App\Models\UsuarioArquivo;

class arquivoController extends Controller  {

    public function listar(Request $request){

        //valida se o usuario está logado
        if(Controller::logado($request)){

            //chama o modelo do usuario
            $usuarioArquivoModel = new UsuarioArquivo();
            $arquivoModel = new Arquivo();

            $usuarioLogado = $request->session()->get('usuario');
            $arquivos = [];

            $arquivosUsuario = $usuarioArquivoModel::where('usuario_id', $usuarioLogado['id'])->get();
            foreach ($arquivosUsuario as $key => $arquivo) {
                $arquivos[$key] = $arquivoModel::where('id', $arquivo['arquivo_id'])->first();
            }

            $retorno = [
                'msg' => $request->session()->get('msg'),
                'arquivos' => $arquivos
            ];
    
            Controller::pr($request->session()->get('msg'));
    
            return view('modules/arquivos/arquivos', $retorno);
        }else{
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

            //define o caminho
            $path = "/arquivos/".$usuarioLogado['email'].'/';
    
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
                $arquivoModel->caminho = $path.$nameFile;
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

}