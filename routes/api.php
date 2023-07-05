<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/buscarvitima/{idpeticao}', 'App\Http\Controllers\FormProcessoController@BuscarTodasvitimas');
Route::get('/listarReus/{idpeticao}', 'App\Http\Controllers\FormProcessoController@ListarReus');
Route::get('/buscarDepoimentoVitima', 'App\Http\Controllers\FormProcessoController@BuscarDepoimentoVitima');
Route::get('/buscarProcessos', 'App\Http\Controllers\ProcessoController@BuscarProcesso');
Route::get('/buscarTipoCrimes', 'App\Http\Controllers\ProcessoController@BuscarTipoCrime');
Route::get('/buscarTodosReus', 'App\Http\Controllers\ReuController@GetAllReu');
Route::get('/buscarTodasVitimas', 'App\Http\Controllers\VitimasController@GetAllVitima');
Route::get('/buscarAdvogado', 'App\Http\Controllers\AdvogadoController@GetAllAdvogado');
Route::get('/buscarTodosJuiz', 'App\Http\Controllers\JuizController@ListarTodosJuiz');
Route::get('/buscarTodasAtividades', 'App\Http\Controllers\SessaoController@GetAllAtividades');


Route::post('/cadastrardepoimento', 'App\Http\Controllers\FormProcessoController@Cadastrardepoimento');
Route::post('/cadastrarprocesso', 'App\Http\Controllers\FormProcessoController@CadastrarProcesso');
Route::post('/cadastraradvogado', 'App\Http\Controllers\FormProcessoController@CadastrarAdvogado');
Route::post('/cadastrarjuiz', 'App\Http\Controllers\JuizController@AddJuiz');
Route::post('/udpadeusuarioestado', 'App\Http\Controllers\UsuarioController@UpdateUserioEstado');
Route::post('/Updateuserionivelacesso', 'App\Http\Controllers\UsuarioController@UpdateUserioEstado');
Route::post('/vincularAdvogado', 'App\Http\Controllers\AdvogadoController@VincularAdvogadoProcesso');