<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\processController;
use App\Http\Controllers\ProcessoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FormProcessoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class,'index']);
Route::get('/menu', [LoginController::class,'menu']);
Route::get('/newAccount', [LoginController::class,'newAccount']);
Route::get('/processo', [processController::class,'processo']);
Route::get('/cadastrarReu', [FormProcessoController::class,'reu']);
Route::get('/cadastrarProcesso', [FormProcessoController::class,'processo']);
Route::get('/cadastrarPeticao', [FormProcessoController::class,'peticao']);
Route::get('/cadastrarDepoimento', [FormProcessoController::class,'depoimento']);
Route::get('/cadastrarOReu', [FormProcessoController::class,'reu']);
Route::get('/cadastrarVitima', [FormProcessoController::class,'depoimento']);
Route::get('/cadastrarAutor', [FormProcessoController::class,'autor']);
Route::get('/editarUsuario', [UsuarioController::class,'EditarUsuario']);

Route::get('/criarProcesso', [ProcessoController::class,'CriarProcesso']);


Route::post('/CriarConta', [LoginController::class,'criarconta']) -> name('User.CriarConta');
Route::post('/login', [LoginController::class,'login']) -> name('User.Login');
Route::post('/editarUsuario', [UsuarioController::class,'editar']) -> name('User.Edit');
Route::post('/cadastrarPeticao', [FormProcessoController::class,'CadastrarPeticao']) -> name('processo.cadastro');


Route::post('/CriarProcessoReu', [ProcessoController::class,'CriarProcessoReu']) -> name('Processo.Create');

