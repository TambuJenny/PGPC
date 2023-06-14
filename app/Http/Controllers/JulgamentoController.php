<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JulgamentoController extends Controller
{
    public function GetAllJulgamento ()
    {
       
    }

    public function ListarJulgamento ()
    {
        return view('pages.Julgamento.listarJulgamento');
    }
    public function MarcarJulgamento ()
    {
        return view('pages.Julgamento.marcarJulgamento');
    }

}
