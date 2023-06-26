<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\processController;
use App\Http\Controllers\ProcessoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FormProcessoController;
use App\Http\Controllers\AdvogadoController;
use App\Http\Controllers\JuizController;
use App\Http\Controllers\JulgamentoController;
use App\Http\Controllers\ReuController;
use App\Http\Controllers\VitimasController;
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
Route::get('/cadastrarReu', [FormProcessoController::class,'reu']);
Route::get('/cadastrarVitima', [FormProcessoController::class,'vitima']); 
Route::get('/listarProcessos', [FormProcessoController::class,'ListarProcessos']);
Route::get('/cadastrarAutor', [FormProcessoController::class,'autor']);
Route::get('/editarUsuario', [UsuarioController::class,'EditarUsuario']);
Route::get('/logout', [LoginController::class,'Logout']);
Route::get('/Reu', [ReuController::class,'ListarReu']);
Route::get('/listarUsuario', [UsuarioController::class,'ListarUsuario']);
Route::get('/listarAdvogado', [AdvogadoController::class,'listarAdvogado']);
Route::get('/listarJuiz', [JuizController::class,'listarJuiz']);
Route::get('/listarJulgamento', [JulgamentoController::class,'ListarJulgamento']);
Route::get('/marcarJulgamento', [JulgamentoController::class,'MarcarJulgamento']);
Route::get('/vitima', [VitimasController::class,'ListarVitima']);
Route::get('/pesquisa', 'SeuController@metodoDePesquisa')->name('nome_da_rota');
Route::get('/pesquisa', 'SeuController@metodoDePesquisa')->name('nome_da_rota');
Route::get('/detalhesProcesso', [FormProcessoController::class,'DetalhesProcessos'])->name('nome_da_rota');
Route::get('/listarProcesso', [FormProcessoController::class,'ListarProcesso']);
Route::get('/listarProcesso', [FormProcessoController::class,'ListarProcesso']);

Route::get('/criarProcesso', [ProcessoController::class,'CriarProcesso']);



Route::post('/CriarConta', [LoginController::class,'criarconta']) -> name('User.CriarConta');
Route::post('/login', [LoginController::class,'login']) -> name('User.Login');
Route::post('/editarUsuario', [UsuarioController::class,'editar']) -> name('User.Edit');
Route::post('/cadastrarPeticao', [FormProcessoController::class,'CadastrarPeticao']) -> name('processo.peticao');
Route::post('/cadastrarVitima', [FormProcessoController::class,'CadastrarVitima']) -> name('processo.vitima');
Route::post('/cadastrarReu', [FormProcessoController::class,'CadastrarReu']) -> name('processo.reu');



Route::post('/CriarProcessoReu', [ProcessoController::class,'CriarProcessoReu']) -> name('Processo.Create');

