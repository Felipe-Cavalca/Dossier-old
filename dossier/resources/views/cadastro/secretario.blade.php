@extends('templates/secretario')
@extends('navs/secretario')

@section('css')
@endsection

@section('js')
@endsection

@section('pagina')
<form id="login" action="{{ route('cadastroSecretario') }}" method="post" class="row">
    @csrf
    <div class="mb-3 col-12">
        <label for="nome" class="form-label">Nome</label>
        <input type="nome"
            name="nome"
            id="nome"
            class="form-control"
            value="{{$nome}}"
            required
            aria-describedby="nomeHelp">
        <div id="nomeHelp" class="form-text">Cadastre o nome do secretario</div>
    </div>
    <div class="mb-3 col-12">
        <label for="email" class="form-label">Email</label>
        <input type="email"
            name="email"
            id="email"
            class="form-control"
            value="{{$email}}"
            required
            aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Cadastre o email do secretario</div>
    </div>
    <div class="mb-3 col">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" 
            name="senha"
            id="senha"
            class="form-control"
            required
            aria-describedby="senhaHelp">
        <div id="senhaHelp" class="form-text">Cadastre a senha que o secretario usará para entrar no sistema</div>
    </div>
    <div class="mb-3 col">
        <label for="confirmaSenha" class="form-label">confirma Senha</label>
        <input type="password" 
            name="confirmaSenha"
            id="confirmaSenha"
            class="form-control"
            required
            aria-describedby="confirmaSenhaHelp">
        <div id="confirmaSenhaHelp" class="form-text">confirme a senha que o secretario usará para entrar no sistema</div>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
</form>

@if ($msg['erro'] == 'sucesso')
    <div class="alert alert-success mt-5" role="alert">
    Secretario {{$msg['secretario']}} cadastrado com sucesso
    </div>
@elseif ($msg['erro'] == 'senha')
    <div class="alert alert-secondary mt-5" role="alert">
    As senhas não batem
    </div>
@elseif ($msg['erro'] == 'email')
    <div class="alert alert-secondary mt-5" role="alert">
    Email já cadastrado no sistema
    </div>
@elseif ($msg['erro'] != '')
    <div class="alert alert-secondary mt-5" role="alert">
    Erro desconhecido
    </div>
@endif

@if($msg['erro'] != '')
    <script type="text/javascript">
    setTimeout(function(){
        $('.alert').hide();
    }, 5000);
    </script>
@endif

@endsection 