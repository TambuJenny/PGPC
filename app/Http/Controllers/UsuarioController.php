<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function editarUsuario($idUser){
        
        return view('pages.usuario.editarUsuario');
    }

    public function BuscarDadosUsuario(){

    }

    public function ApagarUsuario(){
        
    }
}
