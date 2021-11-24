@extends ('templates/html')

@section('cssTemplate')
<link rel="stylesheet" type="text/css" href="{{asset('css/folder_style.css')}}" media="screen" />
@endsection

@section('jsTemplate')
@endsection

@section('body')
<section class="layout cima">
    <div class="row">
        <div class="col-4">
        </div>

        <div class="folha1 col-4 ">
            <p class="folha1"></p>
            <hr>
        </div>

        <div class="folha1 col-4 ">
            <p class="folha1"></p>
            <hr>
        </div>

        <div class="col-4">
        </div>

        <div class="folha2 col-4 ">
            <p class="folha2"></p>
            <hr>
        </div>

        <div class="folha2 col-4 ">
            <hr>
        </div>

        <div class="col-4">
        </div>

        <div class="col-4">
            <img src="{{asset('img/dossier_logo.png')}}" class="img-fluid mt-4" alt="" srcset="">
        </div>

        <div class="col-4">
        </div>
    </div>
</section>
@yield('pagina')
@endsection