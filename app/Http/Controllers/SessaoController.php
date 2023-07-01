<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessaoController extends Controller
{
    public function ListarSessoes ()
    {
        
        return view('pages.Sessao.ListarSessoes');
        
    }
}
