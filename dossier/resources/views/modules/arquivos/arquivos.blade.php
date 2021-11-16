@extends('modules/arquivos/template')

@section('css')
@endsection

@section('js')
@endsection

@section('pagina')

@if (isset($mensagem))
  <div>
    {{$msg['sucesso']}}
  </div>
@endif

<hr>
<div class="m-3">
  <h3>Upload de arquivo</h3>
  <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-group mb-3">
        <input name="arquivo" type="file" class="form-control" id="arquivo">
    </div>

    <button class="btn btn-primary" type="submit">Enviar Arquivo</button>
  </form>
</div>
<hr>
<div class="m-3">
  <h3>Criação de pasta</h3>
  <form action="{{ route('criar-pasta') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Pasta</label>
        <input type="text" name="nome" class="form-control" id="nome">
    </div>
    <button type="submit" class="btn btn-primary">Criar pasta</button>
  </form>
</div>
<hr>
<h3>Navegação em arquivos/pastas</h3>
@if (isset($pastaPai))
  <div class="m-3">
    <a href="arquivos?pasta={{$pastaPai}}">
      <button class="btn btn-info">Voltar</button>
    </a>
  </div>
@endif

<table class="table table-primary">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">download</th>
      <th scope="col">excluir</th>
    </tr>
  </thead>
  <tbody>
    @foreach($arquivos as $arquivo)
      <tr>
        <th scope="row">{{$arquivo['nome']}}</th>
        <td>
          @if ($arquivo['tipo'] == 'arquivo')
            <a href="download?id={{$arquivo['id']}}" target="_blank">
              <button class="btn btn-secondary">Download</button>
            </a>
          @elseif($arquivo['tipo'] == 'pasta')
            <a href="arquivos?pasta={{$arquivo['id']}}">
              <button class="btn btn-secondary">Entrar</button>
            </a>
          @endif
        </td>
        <td>
          <a href="deleta?id={{$arquivo['id']}}">
              <button class="btn btn-danger">Excluir</button>
            </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>


@endsection