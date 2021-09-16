@extends ('templates/deslogado')


@section('pagina')
<form id="login">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Use o email fornecido pela instituição</div>
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="logado">
        <label class="form-check-label" for="logado">Manter logado</label>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
    <a href="recupera-senha" class="btn btn-warning btn-lg">Esqueci a senha</a>
</form>
@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}" media="screen"/>
@endsection

@section('js')
@endsection