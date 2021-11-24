@extends ('templates/deslogado')

@section('css')
@endsection

@section('js')
@endsection

@section('pagina')<center>
    <section class="formulario centro">
        <div class="card text-left" style="width: 28rem;">
            <div class="card-body">
                <!-- <form id="recuperar-senha" method="post"> -->
                    @csrf
                    <div class="">
                        <label for="email" class="form-label">{{__('campos.email')}}</label>
                        <input type="email" name="email" class="form-control align-center email" id="email" required>

                        <button type="submit" class="btn btn-primary mt-3">{{__('botoes.enviar')}}</button>
                        <a href="/">
                            <button type="button" class="btn btn-danger mt-3">{{__('botoes.voltar')}}</button>
                        </a>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </section>
</center>
@endsection