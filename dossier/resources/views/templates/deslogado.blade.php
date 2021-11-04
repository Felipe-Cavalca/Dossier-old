@extends ('templates/html')

@section('cssTemplate')
<link rel="stylesheet" type="text/css" href="{{asset('css/templates/deslogado.css')}}" media="screen"/>
@endsection

@section('jsTemplate')
@endsection

@section('body')
<div class="container-fluid mt-5">
    <div class="titulo">
        <h1>{{__('deslogado.nomeProjeto')}}</h1>
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
