@extends('templates/aluno')

@section('css')
<style>
    iframe {
        width: 100%;
        height: 500px;
    }
</style>
@endsection

@section('js')
@endsection

@section('pagina')
<section class="menu">
    <ul class="nav alunav">
        <li class="nav-item">
            <a class="nav-link navite" href="#"> <i class="fas fa-folder"></i> Meus arquivos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navite" href="#"> <i class="fas fa-folder"></i> Arquivos recebidos</a>
        </li>
    </ul>
</section>
<iframe src="/arquivos"></iframe>
<hr>
@endsection