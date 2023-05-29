<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\ProcessoRepository;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    public function processo(){
        return view('pages.novo_processo');
    }

}
