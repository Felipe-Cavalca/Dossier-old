@extends ('templates/deslogado')

@section('css')
<style>
    .invalido {
        border: 4px solid red;
    }
</style>
@endsection

@section('js')
@endsection

@section('pagina')
<center>
    <section class="formulario centro">
        <div class="card text-left" style="width: 28rem;">
            <div class="card-body">
                <form id="login" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="">
                        <label for="email" class="form-label">{{__('campos.email')}}</label>
                        <input type="email" name="email" value="{{$email}}" class="form-control align-center email" id="email" required>

                        <label for="senha" class="form-label mt-2">{{__('campos.senha')}}</label>
                        <input type="password" name="senha" class="form-control align-center senha" id="senha" required>

                        <button type="submit" class="btn btn-primary mt-3">{{__('botoes.enviar')}}</button>
                        <a href="{{route('recuperarSenha')}}">
                            <button type="button" class="btn btn-danger mt-3">{{__('botoes.esqueci_senha')}}</button>
                        </a>
                    </div>
                </form>
                @if ($msg['erro'] == 'invalido')
                <div class="alert alert-secondary mt-5" role="alert">
                    {{__('alert.email_senha_invalido')}}
                </div>
                @elseif ($msg['erro'] == 'tipo')
                <div class="alert alert-secondary mt-5" role="alert">
                    {{__('alert.tipo_usuario_n_localizado')}}
                </div>
                @elseif ($msg['erro'] != '')
                <div class="alert alert-secondary mt-5" role="alert">
                    {{__('alert.erro_desconhecido')}}
                </div>
                @endif

                @if($msg['erro'] != '')
                <script type="text/javascript">
                    setTimeout(function() {
                        $('.alert').hide();
                    }, 5000);
                </script>
                @endif
            </div>
        </div>
    </section>
</center>
@endsection