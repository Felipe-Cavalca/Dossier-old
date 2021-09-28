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
Route::get('/', [loginController::class, 'login']);
Route::post('/', [loginController::class, 'logar']);
Route::get('/recuperar-senha', [loginController::class, 'recuperarSenha']);

//secretario
Route::get('/secretario//', [secretarioController::class, 'arquivos']);
//aluno
Route::get('/aluno//', [alunoController::class, 'arquivos']);

//cadastros
Route::get('/cadastro/aluno', [cadastroController::class, 'cadastroAluno']);

//modules
Route::get('/arquivos', [arquivoController::class, 'listar']);