@extends ('templates/deslogado')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}" media="screen"/>
@endsection

@section('js')
@endsection

@section('pagina')
<form id="login" method="post">
    <div>@csrf</div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
            name="email"
            id="email"
            class="form-control {{$erro}}"
            value="{{$email}}"
            required
            aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Use o email fornecido pela instituição</div>
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" 
            name="senha"
            id="senha"
            class="form-control {{$erro}}"
            required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" 
            name="check"
            id="logado"
            {{$check}}
            class="form-check-input">
        <label class="form-check-label" for="logado">Manter logado</label>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
    <a href="recuperar-senha" class="btn btn-warning btn-lg">Esqueci a senha</a>
</form>
@endsection