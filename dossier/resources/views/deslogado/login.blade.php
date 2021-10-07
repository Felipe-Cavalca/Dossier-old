@extends ('templates/deslogado')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}" media="screen"/>
@endsection

@section('js')
@endsection

@section('pagina')
<form id="login" method="post">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
            name="email"
            id="email"
            class="form-control"
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
            class="form-control"
            required>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" 
            name="check"
            id="check"
            {{$check}}
            class="form-check-input">
        <label class="form-check-label" for="check">Manter logado</label>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
    <a href="recuperar-senha" class="btn btn-warning btn-lg">Esqueci a senha</a>
</form>

@if ($msg['erro'] == 'invalido')
    <div class="alert alert-secondary mt-5" role="alert">
    Email ou senha invalidos
    </div>
@elseif ($msg['erro'] == 'tipo')
    <div class="alert alert-secondary mt-5" role="alert">
    O seu tipo de usuario não foi localizado
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