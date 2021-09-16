@extends ('templates/html')


@section('body')
<div class="container-fluid mt-5">
    <div class="titulo">
        <h1>Dossier</h1>
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="card central">
        <div class="card-body">
            @yield('pagina')
        </div>
    </div>
</div>
@endsection

@section('css2')
<link rel="stylesheet" type="text/css" href="{{asset('css/templates/deslogado.css')}}" media="screen"/>
@endsection