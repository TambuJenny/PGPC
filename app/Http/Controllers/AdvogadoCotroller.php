<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdvogadoService;


class AdvogadoCotroller extends Controller
{
    public function GetAllAdvogado ()
    {
       
    }

    public function ListarAdvogado ()
    {
        return view('pages.Advogado.listarAdvogado');
    }
}
