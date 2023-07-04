<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repository\ReuRepository;
use App\Helper\ControloNivelAcesso;
use Illuminate\Http\Request;

class ReuController extends Controller
{
    public function GetAllReu ()
    {
        return Response() ->json(ReuRepository::FindAll());
        ControloNivelAcesso::Evento('Cadastrou peticao');
    }

    public function ListarReu ()
    {
        
        return 
        (ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"all")) ? 
        view('pages.Reu.ListarReu') : 
        view('pages.AcessoNegado');
        
    }
}
