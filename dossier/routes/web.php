<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\secretarioController;
use App\Http\Controllers\alunoController;
use App\Http\Controllers\arquivoController;
use App\Http\Controllers\cadastroController;
use App\Http\Controllers\professorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//rotas acessadas via get
//deslogado
Route::get('/', [loginController::class, 'login'])->name('login');
Route::post('/', [loginController::class, 'login'])->name('login');
Route::get('/recuperar-senha', [loginController::class, 'recuperarSenha'])->name('recuperarSenha');
Route::get('/sair', [loginController::class, 'login'])->name('deslogar');

//secretario
Route::get('/secretario//', [secretarioController::class, 'arquivos']);
Route::get('/usuario-list//', [secretarioController::class, 'usuarioList'])->name('usuarioList');
Route::get('/usuario-dell', [secretarioController::class, 'usuarioDell'])->name('usuarioDell');
Route::get('/usuario-edit', [secretarioController::class, 'usuarioEdit'])->name('usuarioEdit');
Route::post('/usuario-edit', [secretarioController::class, 'editarUsuario'])->name('usuarioEdit');

//aluno
Route::get('/aluno//', [alunoController::class, 'home'])->name('alunoHome');
Route::get('/aluno/armazenamento/', [alunoController::class, 'armazenamento'])->name('alunoArmazenamento');
Route::get('/aluno/arquivos/', [alunoController::class, 'arquivos'])->name('alunoArquivos');
Route::get('/aluno/grupos/', [alunoController::class, 'grupos'])->name('alunoGrupos');

//professor
Route::get('/professor//', [professorController::class, 'home'])->name('professorHome');
Route::get('/professor/armazenamento/', [professorController::class, 'armazenamento'])->name('professorArmazenamento');
Route::get('/professor/arquivos/', [professorController::class, 'arquivos'])->name('professorArquivos');
Route::get('/professor/grupos/', [professorController::class, 'grupos'])->name('professorGrupos');

//cadastros
Route::get('/cadastro/secretario', [cadastroController::class, 'cadastroSecretario'])->name('cadastroSecretario');
Route::post('/cadastro/secretario', [cadastroController::class, 'cadastroSecretario'])->name('cadastroSecretario');
Route::get('/cadastro/aluno', [cadastroController::class, 'cadastroAluno'])->name('cadastroAluno');
Route::post('/cadastro/aluno', [cadastroController::class, 'cadastroAluno'])->name('cadastroAluno');
Route::get('/cadastro/professor', [cadastroController::class, 'cadastroProfessor'])->name('cadastroProfessor');
Route::post('/cadastro/professor', [cadastroController::class, 'cadastroProfessor'])->name('cadastroProfessor');

//modules
Route::get('/arquivos', [arquivoController::class, 'listar']);
Route::post('/arquivos', [arquivoController::class, 'upload'])->name('upload');
Route::get('/download', [arquivoController::class, 'download'])->name('download');
Route::post('/criarPasta', [arquivoController::class, 'criarPasta'])->name('criar-pasta');
Route::get('/deleta', [arquivoController::class, 'deleta'])->name('deleta');