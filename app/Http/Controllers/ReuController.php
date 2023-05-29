<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\ReuRepository;
use Illuminate\Http\Request;

class ReuController extends Controller
{
    public function GetAllReu ()
    {
        return Response() ->json(ReuRepository::FindAll());
    }

    public function ListarReu ()
    {
        return view('pages.Reu.ListarReu');
    }
}
