@extends('templates/secretario')
@extends('navs/secretario')

@section('css')
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#lista_usuarios').DataTable({
            language: {
                url: 'http://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json'
            }
        });
    });
</script>
@endsection

@section('pagina')
<h3>Listagem de usuarios</h3>
<table class="table table-striped" id="lista_usuarios">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">cpf</th>
            <th scope="col">Telefone</th>
            <th scope="col">Nascimento</th>
            <th scope="col">Ativo</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <th scope="row">{{$usuario['nome']}}</th>
            <td>{{$usuario['email']}}</td>
            <td>{{$usuario['cpf']}}</td>
            <td>{{$usuario['telefone']}}</td>
            <td>{{$usuario['nascimento']}}</td>
            <td>{{$usuario['ativo']}}</td>
            <td style="color: green">V</td>
            <td><a style="text-decoration: none; color: red" href="usuario-dell?id={{$usuario['id']}}">X</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection