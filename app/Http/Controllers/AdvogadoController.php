<?php

namespace App\Http\Controllers;

use App\Helper\ControloNivelAcesso;
use App\Http\Controllers\Controller;
use App\Repository\AdvogadoRepository;
use Illuminate\Http\Request;
use App\Services\AdvogadoService;
use Facade\FlareClient\Http\Response;

class AdvogadoController extends Controller
{
    public function GetAllAdvogado ()
    {
       $advogadoService = new AdvogadoService ();
       return Response()->json(AdvogadoRepository::FindAllAdvogados());
       
    }

    public function ListarAdvogado ()
    {
       
        return ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"advogado") ?
         view('pages.Advogado.listarAdvogado'): 
         view('pages.AcessoNegado'); 
    }
    public function CadastrarAdvogado ()
    {
        return ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"advogado") ?
        view('pages.Advogado.novoAdvogado'): 
        view('pages.AcessoNegado'); 
        ControloNivelAcesso::Evento('Cadastrou peticao');
    }

}
