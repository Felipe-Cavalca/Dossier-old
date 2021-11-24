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
            <label for="nome" class="form-label">{{__('campos.nome')}}</label>
            <input type="text"
                name="nome"
                id="nome"
                class="form-control nome"
                value="{{$nome}}"
                required
                aria-describedby="nomeHelp">
            <div id="nomeHelp" class="form-text">{{__('campos.nomeHelp')}}</div>
        </div>
        <div class="mb-3 col-6">
            <label for="email" class="form-label">{{__('campos.email')}}</label>
            <input type="email"
                name="email"
                id="email"
                class="form-control email"
                value="{{$email}}"
                required
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">{{__('campos.emailHelp')}}</div>
        </div>
        <div class="mb-3 col-6">
            <label for="senha" class="form-label">{{__('campos.senha')}}</label>
            <input type="password" 
                name="senha"
                id="senha"
                class="form-control senha"
                required
                aria-describedby="senhaHelp">
            <div id="senhaHelp" class="form-text">{{__('campos.senhaHelp')}}</div>
        </div>
        <div class="mb-3 col-6">
            <label for="confirmaSenha" class="form-label">{{__('campos.confirmaSenha')}}</label>
            <input type="password" 
                name="confirmaSenha"
                id="confirmaSenha"
                class="form-control senha"
                required
                aria-describedby="confirmaSenhaHelp">
            <div id="confirmaSenhaHelp" class="form-text">{{__('campos.confirmaSenhaHelp')}}</div>
        </div>
        <div class="mb-3 col-4">
            <label for="cpf" class="form-label">{{__('campos.cpf')}}</label>
            <input type="text" 
                name="cpf"
                id="cpf"
                class="form-control cpf"
                value="{{$cpf}}"
                required
                aria-describedby="cpfHelp">
            <div id="cpfHelp" class="form-text">{{__('campos.cpfHelp')}}</div>
        </div>
        <div class="mb-3 col-4">
            <label for="telefone" class="form-label">{{__('campos.telefone')}}</label>
            <input type="text" 
                name="telefone"
                id="telefone"
                class="form-control telefone"
                value="{{$telefone}}"
                required
                aria-describedby="telefoneHelp">
            <div id="telefoneHelp" class="form-text">{{__('campos.telefoneHelp')}}</div>
        </div>
        <div class="mb-3 col-4">
            <label for="nascimento" class="form-label">{{__('campos.nascimento')}}</label>
            <input type="date" 
                name="nascimento"
                id="nascimento"
                class="form-control data"
                value="{{$nascimento}}"
                required
                aria-describedby="nascimentoHelp">
            <div id="confirmaSenhaHelp" class="form-text">{{__('campos.nascimentoHelp')}}</div>
        </div>
    </div>

    <div class="mb-3 col-12">
        <label for="turno" class="form-label">{{__('campos.turno')}}</label>
        <input type="text"
            name="turno"
            id="turno"
            class="form-control turno"
            value="{{$turno}}"
            required
            aria-describedby="turnoHelp">
        <div id="turnoHelp" class="form-text">{{__('campos.turnoHelp')}}</div>
    </div>

    <button type="submit" class="btn btn-primary btn-lg">{{__('botoes.cadastrar')}}</button>
</form>

<!--msg de erro-->
@if ($msg['erro'] == 'sucesso')
    <div class="alert alert-success mt-5" role="alert">
    {{__(alert.cadastroSucesso)}}
    </div>
@elseif ($msg['erro'] == 'senha')
    <div class="alert alert-secondary mt-5" role="alert">
    {{__(alert.senhaNBate)}}
    </div>
@elseif ($msg['erro'] == 'email')
    <div class="alert alert-secondary mt-5" role="alert">
    {{__(alert.emailRepetido)}}
    </div>
@elseif ($msg['erro'] != '')
    <div class="alert alert-secondary mt-5" role="alert">
    {{__(alert.erroDesconhecido)}}
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