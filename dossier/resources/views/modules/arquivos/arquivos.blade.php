@extends('modules/arquivos/template')

@section('css')
@endsection

@section('js')
@endsection

@section('pagina')
<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="file" name="arquivo">

  <button type="submit">Enviar Arquivo</button>
</form>
<form action="{{ route('criar-pasta') }}" method="post">
  @csrf
  <input type="text" name="nome">

  <button type="submit">Criar pasta</button>
</form>

@if (isset($pastaPai))
  <a href="arquivos?pasta={{$pastaPai}}">
    <button>Voltar</button>
  </a>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">download</th>
    </tr>
  </thead>
  <tbody>
    @foreach($arquivos as $arquivo)
      <tr>
        <th scope="row">{{$arquivo['nome']}}</th>
        <td>
          @if ($arquivo['tipo'] == 'arquivo')
            <a href="download?id={{$arquivo['id']}}" target="_blank">
              <button >Download</button>
            </a>
          @elseif($arquivo['tipo'] == 'pasta')
            <a href="arquivos?pasta={{$arquivo['id']}}">
              <button >Entrar</button>
            </a>
          @endif
        </td>
      </tr>
    @endforeach
  </tbody>
</table>


@endsection