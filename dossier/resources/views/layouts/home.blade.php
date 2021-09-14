@extends('layouts/html')

@section('pagina')
    <div class="container">
        <h1>
            @yield('topoPagina')
        </h1>
    </div>
    aqui é a nav
    <br><br>
    <div>
        @yield('conteudo')
    </div>
    <footer>
        @yield('footer')
    </footer>
    <div>
        @dossier 2021
    </div>
@endsection