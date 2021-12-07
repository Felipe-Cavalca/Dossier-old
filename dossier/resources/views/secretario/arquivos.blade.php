@extends('templates/secretario')

@section('css')
@endsection

@section('js')
<script type="text/javascript">
    var tab = sessionStorage.getItem('tab');
    if(tab != null){
        $("[data-bs-target='"+tab+"']").addClass('active');
        $(tab).addClass('show active');
    }

    $(document).ready(function() {
        $('#arquivos').DataTable({
            language: {
                url: 'http://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json'
            }
        });

        
    });

    $("#navs-arquivos button").click(function(){
        sessionStorage.setItem('tab', $(this).data().bsTarget);
    })
</script>
@endsection

@section('pagina')
<section class="menu">
    <nav>
        <div class="nav nav-tabs alunav" id="navs-arquivos">
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#meus-arquivos"> <i class="fas fa-folder"></i> Meus arquivos</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#arquivos-recebidos"> <i class="fas fa-folder"></i> Arquivos recebidos</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#novo-arquivo"> <i class="fas fa-folder"></i> Novo arquivo</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#nova-pasta"> <i class="fas fa-folder"></i> Criar pasta</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="meus-arquivos">
            <div class="card">
                <div class="card-body">
                    <div class="mt-3">
                        @if (isset($pastaPai))
                        <div class="m-3">
                            <a href="arquivos?pasta={{$pastaPai}}">
                                <button class="btn btn-info">Voltar</button>
                            </a>
                        </div>
                        @endif
                        <table class="table table-striped" id="arquivos">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Downloas/Entrar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arquivos as $arquivo)
                                <tr>
                                    <th scope="row">{{$arquivo['nome']}}</th>
                                    <td>
                                        @if ($arquivo['tipo'] == 'arquivo')
                                        <a href="{{ route('download') }}?id={{$arquivo['id']}}" target="_blank">
                                            <button class="btn btn-secondary">Download</button>
                                        </a>
                                        @elseif($arquivo['tipo'] == 'pasta')
                                        <a href="arquivos?pasta={{$arquivo['id']}}">
                                            <button class="btn btn-secondary">Entrar</button>
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('deleta') }}?id={{$arquivo['id']}}">
                                            <button class="btn btn-danger">Excluir</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="arquivos-recebidos">B</div>
        <div class="tab-pane fade" id="novo-arquivo">
            <div class="card">
                <div class="card-body">
                    <div class="m-3">
                        <h3>Upload de arquivo</h3>
                        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <input name="arquivo" type="file" class="form-control" id="arquivo">
                            </div>

                            <button class="btn btn-primary" type="submit">Enviar Arquivo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nova-pasta">
            <div class="card">
                <div class="card-body">
                    <div class="m-3">
                        <h3>Criação de pasta</h3>
                        <form action="{{ route('criar-pasta') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nome" class="form-label">Pasta</label>
                                <input type="text" name="nome" class="form-control" id="nome">
                            </div>
                            <button type="submit" class="btn btn-primary">Criar pasta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection