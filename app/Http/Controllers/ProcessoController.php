<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    //
    public function CriarProcesso ()
    {
        return view('pages.processo');
    }
}
