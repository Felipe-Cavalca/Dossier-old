<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\secretarioController;
use App\Http\Controllers\alunoController;
use App\Http\Controllers\arquivoController;
use App\Http\Controllers\cadastroController;

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
Route::get('/', [loginController::class, 'login'])->name('login')->name('login');
Route::post('/', [loginController::class, 'login'])->name('login')->name('login');
Route::get('/recuperar-senha', [loginController::class, 'recuperarSenha'])->name('recuperarSenha');

//secretario
Route::get('/secretario//', [secretarioController::class, 'arquivos']);
//aluno
Route::get('/aluno//', [alunoController::class, 'arquivos']);

//cadastros
Route::get('/cadastro/aluno', [cadastroController::class, 'cadastroAluno'])->name('cadastroAluno');
Route::get('/cadastro/secretario', [cadastroController::class, 'cadastroSecretario'])->name('cadastroSecretario');
Route::post('/cadastro/secretario', [cadastroController::class, 'cadastroSecretario'])->name('cadastroSecretario');


//modules
Route::get('/arquivos', [arquivoController::class, 'listar']);
Route::post('/arquivos', [arquivoController::class, 'upload'])->name('upload');
Route::get('/download', [arquivoController::class, 'download'])->name('download');
Route::post('/criarPasta', [arquivoController::class, 'criarPasta'])->name('criar-pasta');