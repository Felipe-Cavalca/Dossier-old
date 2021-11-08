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
          <a href="download?id={{$arquivo['id']}}" target="_blank">
            <button >Download</button>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>


@endsection