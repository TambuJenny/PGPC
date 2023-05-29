<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\VitimaRepository;
use Illuminate\Http\Request;

class VitimasController extends Controller
{
    public function GetAllVitima ()
    {
        return Response() ->json(VitimaRepository::FindAllVitima());
    }

    public function ListarVitima ()
    {
        return view('pages.Vitima.ListarVitima');
    }
}
