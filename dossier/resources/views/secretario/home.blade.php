@extends('templates/secretario')
@extends('navs/secretario')

@section('css')
<style>
    iframe{
        width: 100%;
        height: 700px;
    }
</style>
@endsection

@section('js')
@endsection

@section('pagina')
<a href="/arquivos" target="_blank">Expandir</a>
<hr>
<iframe src="/arquivos"></iframe>
@endsection