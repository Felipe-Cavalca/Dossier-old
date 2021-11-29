@extends('templates/secretario')

@section('css')
@endsection

@section('js')
<script type="text/javascript">
    //valida qual tab está selecionada
    var tab = sessionStorage.getItem('tabGrupos');
    if (tab != null) {
        $("[data-bs-target='" + tab + "']").addClass('active');
        $(tab).addClass('show active');
    }

    $("#navs-arquivos button").click(function() {
        sessionStorage.setItem('tabGrupos', $(this).data().bsTarget);
    })
</script>
@endsection

@section('pagina')
<section class="menu">
    <nav>
        <div class="nav nav-tabs alunav" id="navs-arquivos">
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#gerenciar-grupos"> <i class="fas fa-folder"></i> Gerenciar grupos</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#ver-grupos"> <i class="fas fa-folder"></i> Ver grupos</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#novo-grupo"> <i class="fas fa-folder"></i> Criar grupo</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="gerenciar-grupos">
            <section class="grupos">
                <div class="card text-center">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> Nome do Grupo</h5>
                        <p class="card-text">Participantes: Fulano, Beltrano</p>
                        <a href="#" class="btn btn-primary">Editar grupo</a>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> Nome do Grupo</h5>
                        <p class="card-text">Participantes: Fulano, Beltrano</p>
                        <a href="#" class="btn btn-primary">Editar grupo</a>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> Nome do Grupo</h5>
                        <p class="card-text">Participantes: Fulano, Beltrano</p>
                        <a href="#" class="btn btn-primary">Editar grupo</a>
                    </div>
                </div>
            </section>
        </div>
        <div class="tab-pane fade" id="ver-grupos">
            <section class="grupos">
                <div class="card text-center">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> Nome do Grupo</h5>
                        <p class="card-text">Participantes: Fulano, Beltrano</p>
                        <a href="#" class="btn btn-primary">Arquivos do grupo</a>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> Nome do Grupo</h5>
                        <p class="card-text">Participantes: Fulano, Beltrano</p>
                        <a href="#" class="btn btn-primary">Arquivos do grupo</a>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> Nome do Grupo</h5>
                        <p class="card-text">Participantes: Fulano, Beltrano</p>
                        <a href="#" class="btn btn-primary">Arquivos do grupo</a>
                    </div>
                </div>
            </section>
        </div>
        <div class="tab-pane fade" id="novo-grupo">
            <section class="grupos col-12">
                <div class="card ">
                    <div class="card-header text-center">
                        Criar grupo
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nome do grupo</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Nome">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTurma">Turma</label>
                                    <select id="inputTurma" class="form-control">
                                        <option selected>Escolha uma turma...</option>
                                        <option>1º Administração</option>
                                        <option>1º Mecânica</option>
                                        <option>1º Desenvolvimento de sistemas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Descrição do grupo</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Breve descrição">
                            </div>
                            <div class="form-group">
                                <label for="inputState">Escolha os participantes</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Alunos...</option>
                                    <option>Fulano</option>
                                    <option>Ciclano</option>
                                    <option>Beltrano</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Adicionar participante
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Alunos selecionados</label>
                                <select multiple class="form-control" id="exampleFormControlSelect2">
                                    <option>Lista aluno selecionado</option>
                                    <option>Lista aluno selecionado</option>
                                    <option>Lista aluno selecionado</option>
                                    <option>Lista aluno selecionado</option>
                                    <option>Lista aluno selecionado</option>
                                </select>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary">Criar Grupo</button>
                            </center>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection