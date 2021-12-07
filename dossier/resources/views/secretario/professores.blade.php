@extends('templates/secretario')

@section('css')
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        //valida qual tab está selecionada
        var tab = sessionStorage.getItem('tabProfessores');

        if (tab != null) {
            $("[data-bs-target='" + tab + "']").addClass('active');
            $(tab).addClass('show active');
        }

        $("#navs-professores button").click(function() {
            sessionStorage.setItem('tabProfessores', $(this).data().bsTarget);
        })

        $('#professores').DataTable({
            language: {
                url: 'http://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json'
            }
        });
    });
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
            <section class="grupos col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="professores">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Ativo</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professores as $professor)
                                <tr>
                                    <th scope="row">{{$professor['nome']}}</th>
                                    <td>{{$professor['email']}}</td>
                                    <td scope="row">
                                        @if ($professor['ativo'])
                                        Ativo
                                        @else
                                        Inativo
                                        @endif
                                    </td>
                                    <td>V</td>
                                    <td>X</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <div class="tab-pane fade row" id="novo-professor">
            <section class="grupos col-12">
                <div class="card">
                    <div class="card-body">
                        <form id="cadastro" action="{{ route('cadastroProfessor') }}" method="post" class="row">
                            @csrf
                            <div class="form-row row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome do Professor</label>
                                    <input type="text" class="form-control nome" id="nome" name="nome" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control email" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-md-6">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control senha" id="senha" name="senha" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirma-senha">Confirma senha</label>
                                    <input type="password" class="form-control confirma-senha" id="confirma-senha" name="confirmaSenha" required>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control endereco" id="endereo" name="endereco" required>
                            </div>
                            <div class="form-row row mt-2">
                                <div class="form-group col-md-6">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control cpf" id="cpf" name="cpf" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status">Status do professor</label>
                                    <select id="status" class="form-control" name="status" required>
                                        <option disabled selected>Escolha um status...</option>
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-md-4 mt-2">
                                    <label for="nascimento">Data de nascimento</label>
                                    <input type="date" class="form-control nascimento" id="nascimento" name="nascimento" required>
                                </div>
                                <div class="form-group col-md-4 mt-2">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control telefone" id="telefone" name="telefone" required>
                                </div>
                                <div class="form-group col-md-4 mt-2">
                                    <div class="form-row">
                                        <label for="genero">Genero</label>
                                        <select id="genero" class="form-control" name="genero" required>
                                            <option disabled selected>Selecione um genero...</option>
                                            <option value="mas">Masculino</option>
                                            <option value="fem">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary col-4 mt-3">Salvar</button>
                            </center>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection