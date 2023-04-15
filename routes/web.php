<?php

use App\Http\Controllers\LoginController;
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
Route::post('/CriarConta', [LoginController::class,'criarconta']) -> name('User.CriarConta');
Route::post('/login', [LoginController::class,'login']) -> name('User.Login');
