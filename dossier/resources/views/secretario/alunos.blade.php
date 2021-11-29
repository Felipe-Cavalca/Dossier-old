@extends('templates/secretario')

@section('css')
@endsection

@section('js')
<script type="text/javascript">
    //valida qual tab está selecionada
    var tab = sessionStorage.getItem('tabAlunos');
    if (tab != null) {
        $("[data-bs-target='" + tab + "']").addClass('active');
        $(tab).addClass('show active');
    }

    $("#navs-alunos button").click(function() {
        sessionStorage.setItem('tabAlunos', $(this).data().bsTarget);
    })
</script>
@endsection

@section('pagina')
<section class="menu">
    <nav>
        <div class="nav nav-tabs alunav" id="navs-alunos">
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#gerenciar-alunos"> <i class="fas fa-folder"></i> Gerenciar Alunos</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#ver-alunos"> <i class="fas fa-folder"></i> Ver Alunos</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#novo-aluno"> <i class="fas fa-folder"></i> Novo Aluno</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="gerenciar-alunos">
            
        </div>
        <div class="tab-pane fade" id="ver-alunos">
            
        </div>
        <div class="tab-pane fade" id="novo-aluno">
            
        </div>
    </div>
</section>
@endsection