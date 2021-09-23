@extends('templates/html')

@section('cssTemplate')
<link rel="stylesheet" type="text/css" href="{{asset('css/templates/aluno.css')}}" media="screen"/>
@endsection

@section('jsTemplate')
@endsection

@section('body')

    @switch($nav)
        @case('esquerda')
            @yield('nav-esquerda')
            @break
        @default
            @yield('nav-topo')
    @endswitch

    <div class="card m-5 meio-pagina">
        <div class="card-body conteudo">
            @yield('pagina')
        </div>
    </div>

@endsection