@extends('templates/html')

@section('cssTemplate')
<link rel="stylesheet" type="text/css" href="{{asset('css/folder_style.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{asset('css/dossier.css')}}" media="screen" />
@endsection

@section('jsTemplate')
@endsection

@section('body')
<section class="layout cima">
    <div class="row">
        <div class="col-4 nav-nome">
            <h3><i class="fas fa-user-circle"></i> Bem-vindo {{$nomeUsuario}}!</h3>
        </div>

        <div class="folha1 col-4 folhas">
            <p class="folha1"></p>
            <hr>
        </div>

        <div class="folha1 col-4 folhas">
            <p class="folha1"></p>
            <hr>
        </div>

        <div class="col-4 folhas">
        </div>

        <div class="folha2 col-4  folhas">
            <p class="folha2"></p>
            <hr>
        </div>

        <div class="folha2 col-4  folhas">
            <hr>
        </div>

        <div class="col-4 folhas">
        </div>

        <div class="col-4 folhas">

        </div>

        <div class="col-4 folhas">
        </div>
    </div>
</section>


<section class="menu">
    <ul class="nav alunav">
        <li class="nav-item">
            <a class="nav-link navite" href="{{route('alunoArmazenamento')}}"> <i class="fas fa-chart-pie"></i> Meu armazenamento</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navite" href="{{route('alunoArquivos')}}"> <i class="fas fa-file-alt"></i>Arquivos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navite" href="{{route('alunoGrupos')}}"> <i class="fas fa-users"></i> Grupos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navite" href="{{route('deslogar')}}"> <i class="fas fa-sign-out-alt"></i> Sair</a>
        </li>
    </ul>
</section>

@yield('pagina')
@endsection