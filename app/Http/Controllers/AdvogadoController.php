<?php

namespace App\Http\Controllers;

use App\Helper\ControloNivelAcesso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdvogadoService;


class AdvogadoController extends Controller
{
    public function GetAllAdvogado ()
    {
       
    }

    public function ListarAdvogado ()
    {
       if(ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"advogado"))
            return view('pages.Advogado.listarAdvogado');
        return view('pages.AcessoNegado'); 
    }
    public function BusacarAdvogados ()
    {
            
    }

}
