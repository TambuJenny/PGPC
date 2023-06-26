<?php

namespace App\Http\Controllers;

use App\Helper\ControloNivelAcesso;
use App\Http\Controllers\Controller;
use App\Repository\AdvogadoRepository;
use Illuminate\Http\Request;
use App\Services\AdvogadoService;


class AdvogadoController extends Controller
{
    public function GetAllAdvogado ()
    {
       
    }

    public function ListarAdvogado ()
    {
        $advogadoService = new AdvogadoService ();
        return ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"advogado") ?
         view('pages.Advogado.listarAdvogado',["allAdvogado"=>[$advogadoService ->BuscarAdvogado()]]): 
         view('pages.AcessoNegado'); 
    }
    public function BusacarAdvogados ()
    {
            
    }

}
