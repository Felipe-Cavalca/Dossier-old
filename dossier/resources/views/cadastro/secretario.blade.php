@extends('templates/secretario')
@extends('navs/secretario')

@section('css')
@endsection

@section('js')
@endsection

@section('pagina')
<form id="cadastro" action="{{ route('cadastroSecretario') }}" method="post" class="row">
    @csrf

    <div class="sessaoCadastroUsuario row">
        <div class="mb-3 col-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text"
                name="nome"
                id="nome"
                class="form-control"
                value="{{$nome}}"
                required
                aria-describedby="nomeHelp">
            <div id="nomeHelp" class="form-text">Cadastre o nome do secretario</div>
        </div>
        <div class="mb-3 col-6">
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
        <div class="mb-3 col-6">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" 
                name="senha"
                id="senha"
                class="form-control"
                required
                aria-describedby="senhaHelp">
            <div id="senhaHelp" class="form-text">Cadastre a senha que o secretario usará para entrar no sistema</div>
        </div>
        <div class="mb-3 col-6">
            <label for="confirmaSenha" class="form-label">confirma Senha</label>
            <input type="password" 
                name="confirmaSenha"
                id="confirmaSenha"
                class="form-control"
                required
                aria-describedby="confirmaSenhaHelp">
            <div id="confirmaSenhaHelp" class="form-text">confirme a senha que o secretario usará para entrar no sistema</div>
        </div>
        <div class="mb-3 col-4">
            <label for="cpf" class="form-label">cpf</label>
            <input type="text" 
                name="cpf"
                id="cpf"
                class="form-control"
                value="{{$cpf}}"
                placeholder="(xx)00000-0000"
                required
                aria-describedby="telefoneHelp">
            <div id="telefoneHelp" class="form-text">cpf do secretario</div>
        </div>
        <div class="mb-3 col-4">
            <label for="telefone" class="form-label">telefone</label>
            <input type="text" 
                name="telefone"
                id="telefone"
                class="form-control"
                value="{{$telefone}}"
                placeholder="(xx)00000-0000"
                required
                aria-describedby="telefoneHelp">
            <div id="telefoneHelp" class="form-text">Telefone para contao</div>
        </div>
        <div class="mb-3 col-4">
            <label for="nascimento" class="form-label">nascimento</label>
            <input type="date" 
                name="nascimento"
                id="nascimento"
                class="form-control"
                value="{{$nascimento}}"
                required
                aria-describedby="nascimentoHelp">
            <div id="confirmaSenhaHelp" class="form-text">data de nascimento</div>
        </div>
    </div>

    <div class="mb-3 col-12">
        <label for="turno" class="form-label">turno</label>
        <input type="turno"
            name="turno"
            id="turno"
            class="form-control"
            value="{{$turno}}"
            required
            aria-describedby="turnoHelp">
        <div id="turnoHelp" class="form-text">Insira os horarios de trabalho</div>
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