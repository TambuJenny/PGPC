<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\CrimeRepository;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    public function CriarProcesso ()
    {
        $pegarTodosTiposCrime = CrimeRepository::BuscarTodosTipoCrimes();
        return view('pages.processo')->with('pegarTodosTiposCrime', $pegarTodosTiposCrime);
    }

    public function CriarProcessoReu (Request $request)
    {
        
    }
}
