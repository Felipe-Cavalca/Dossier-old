@extends('templates/secretario')
@extends('navs/secretario')

@section('css')
@endsection

@section('js')
@endsection

@section('pagina')
<form id="EDITAR" action="{{ route('usuarioEdit') }}" method="post" class="row">
    @csrf
    <div class="sessaoEditarUsuario row">
        <div class="mb-3 col-6">
            <label for="nome" class="form-label">{{__('campos.nome')}}</label>
            <input type="text"
                name="nome"
                id="nome"
                class="form-control nome"
                value="{{$usuario['nome']}}"
                required>
        </div>
        <div class="mb-3 col-6">
            <label for="email" class="form-label">{{__('campos.email')}}</label>
            <input type="email"
                name="email"
                id="email"
                class="form-control email"
                value="{{$usuario['email']}}"
                required>
        </div>
        <div class="mb-3 col-6">
            <label for="senha" class="form-label">{{__('campos.senha')}}</label>
            <input type="password" 
                name="senha"
                id="senha"
                class="form-control senha">
        </div>
        <div class="mb-3 col-6">
            <label for="confirmaSenha" class="form-label">{{__('campos.confirmaSenha')}}</label>
            <input type="password" 
                name="confirmaSenha"
                id="confirmaSenha"
                class="form-control senha">
        </div>
        <div class="mb-3 col-4">
            <label for="cpf" class="form-label">{{__('campos.cpf')}}</label>
            <input type="text" 
                name="cpf"
                id="cpf"
                class="form-control cpf"
                value="{{$usuario['cpf']}}"
                required>
        </div>
        <div class="mb-3 col-4">
            <label for="telefone" class="form-label">{{__('campos.telefone')}}</label>
            <input type="text" 
                name="telefone"
                id="telefone"
                class="form-control telefone"
                value="{{$usuario['telefone']}}"
                required>
        </div>
        <div class="mb-3 col-4">
            <label for="nascimento" class="form-label">{{__('campos.nascimento')}}</label>
            <input type="date" 
                name="nascimento"
                id="nascimento"
                class="form-control data"
                value="{{$usuario['nascimento']}}"
                required>
        </div>
    </div>

@foreach ($usuario['tipo'] as $tipo)

    @if($tipo['tipo'] == 'Aluno')
        <div class="mb-3 col-12">
            <label for="ra" class="form-label">{{__('campos.ra')}}</label>
            <input type="text"
                name="ra"
                id="ra"
                class="form-control ra"
                value="{{$usuario['aluno']['ra']}}"
                required>
        </div>
    @elseif ($tipo['tipo'] == 'Professor')
        <div class="mb-3 col-12">
            <label for="rg" class="form-label">{{__('campos.rg')}}</label>
            <input type="text"
                name="rg"
                id="rg"
                class="form-control rg"
                value="{{$usuario['professor']['rg']}}"
                required>
        </div>
    @elseif ($tipo['tipo'] == 'Secretario')
        <div class="mb-3 col-12">
            <label for="turno" class="form-label">{{__('campos.turno')}}</label>
            <input type="text"
                name="turno"
                id="turno"
                class="form-control turno"
                value="{{$usuario['secretario']['turno']}}"
                required>
        </div>
    @endif
@endforeach

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