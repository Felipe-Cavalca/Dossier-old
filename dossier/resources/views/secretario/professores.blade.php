@extends('templates/secretario')

@section('css')
@endsection

@section('js')
<script type="text/javascript">
    //valida qual tab está selecionada
    var tab = sessionStorage.getItem('tabProfessores');
    if (tab != null) {
        $("[data-bs-target='" + tab + "']").addClass('active');
        $(tab).addClass('show active');
    }

    $("#navs-professores button").click(function() {
        sessionStorage.setItem('tabProfessores', $(this).data().bsTarget);
    })
</script>
@endsection

@section('pagina')
<section class="menu">
    <nav>
        <div class="nav nav-tabs alunav" id="navs-professores">
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#gerenciar-professores"> <i class="fas fa-folder"></i> Gerenciar Professores</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#ver-professores"> <i class="fas fa-folder"></i> Ver Professores</button>
            <button class="nav-link navite" data-bs-toggle="tab" data-bs-target="#novo-professor"> <i class="fas fa-folder"></i> Novo professor</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="gerenciar-professores">
            
        </div>
        <div class="tab-pane fade" id="ver-professores">
            
        </div>
        <div class="tab-pane fade" id="novo-professor">
            
        </div>
    </div>
</section>
@endsection