<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormProcessoController extends Controller
{
    public function CadastrarReu(){
       return view('pages.Formularios.reu');
    }
}
