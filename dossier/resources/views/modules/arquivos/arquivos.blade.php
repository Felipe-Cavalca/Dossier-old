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


@endsection