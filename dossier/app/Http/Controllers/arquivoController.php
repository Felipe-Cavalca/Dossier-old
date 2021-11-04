<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arquivo;
use App\Models\UsuarioArquivo;

class arquivoController extends Controller  {

    public function listar(Request $request){

        $retorno = [
            'msg' => $request->session()->get('msg')
        ];

        Controller::pr($request->session()->get('msg'));

        return view('modules/arquivos/arquivos', $retorno);
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
                $arquivoModel->dono = $usuarioLogado['id'];
                $arquivoModel->caminho = $path;
                $arquivoModel->save();

                //salva os dados do usuarioArquivo
                $usuarioArquivoModel->usuario = $usuarioLogado['id'];
                $usuarioArquivoModel->arquivo = $arquivoModel->id;
                $usuarioArquivoModel->save();


                $request->session()->put('msg', ['sucesso' => 'upload concluido']);
            }else{
                $request->session()->put('msg', ['erro' => 'não foi possivel fazer o upload']);
            }
        }else{
            $request->session()->put('msg', ['erro' => 'não foi possivel validar o login']);
        }

        return redirect()->back();
    }

}