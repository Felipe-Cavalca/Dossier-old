@extends ('templates/deslogado')

@section('css')
@endsection

@section('js')
@endsection

@section('pagina')
<form id="recupera-senha">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Use o email fornecido pela instituição</div>
    </div>
    <button type="submit" class="btn btn-warning btn-lg">Recuperar</button>
    <a href="/" class="btn btn-primary btn-lg">Voltar</a>
</form>
@endsection