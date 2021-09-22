@extends('modules/arquivos/template')

@section('css')
@endsection

@section('js')
@endsection

@section('pagina')
<ul class="list-group">
  @for($i=0; $i<30; $i++)
    <li class="list-group-item active" aria-current="true">An active item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
    <li class="list-group-item">A fourth item</li>
    <li class="list-group-item">And a fifth one</li>
  @endfor
</ul>
@endsection