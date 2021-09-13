@extends ('layouts/layout')

@section('titulo')
{{$titulo}}
@endsection

@section('conteudo')
<p>olá mundo</p>
<p>dono: {{$dono}}</p>
<p>
    nomes:<br>
    @foreach($nomes as $nome)
    {{$nome}}<br>        
    @endforeach
</p>
<p>
    <img src="{{asset('leao.jpg')}}" alt="icone">
</p>
@endsection