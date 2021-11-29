@extends('templates/secretario')

@section('css')
@endsection

@section('js')
<script type="text/javascript">
    //valida qual tab está selecionada
    var tab = sessionStorage.getItem('tabTurmas');
    if (tab != null) {
        $("[data-bs-target='" + tab + "']").addClass('active');
        $(tab).addClass('show active');
    }

    $("#navs-professores button").click(function() {
        sessionStorage.setItem('tabTurmas', $(this).data().bsTarget);
    })
</script>
@endsection

@section('pagina')
<section class="menu">
    <nav>
        <div class="nav nav-tabs alunav" id="navs-turmas">
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#gerenciar-turmas"> <i class="fas fa-folder"></i> Gerenciar Trumas</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#ver-turmas"> <i class="fas fa-folder"></i> Ver Trumas</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#nova-turmas"> <i class="fas fa-folder"></i> Nova Turma</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="gerenciar-turmas">
            
        </div>
        <div class="tab-pane fade" id="ver-turmas">
            
        </div>
        <div class="tab-pane fade" id="nova-turmas">
            
        </div>
    </div>
</section>
@endsection