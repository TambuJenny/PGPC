<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JuizController extends Controller
{
    
    public function GetAllJuiz ()
    {
       
    }

    public function ListarJuiz ()
    {
        return view('pages.Juiz.listarJuiz');
    }

}
