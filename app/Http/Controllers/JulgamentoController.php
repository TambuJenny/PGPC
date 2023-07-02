<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helper\ControloNivelAcesso;
use Illuminate\Http\Request;

class JulgamentoController extends Controller
{
    public function GetAllJulgamento ()
    {
       
    }

    public function ListarJulgamento ()
    {
        return 
        (ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"all")) ? 
        view('pages.Julgamento.listarJulgamento') : 
        view('pages.AcessoNegado');
    }
    public function MarcarJulgamento ()
    {
        return 
        (ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"all")) ? 
        view('pages.Julgamento.marcarJulgamento') : 
        view('pages.AcessoNegado');
    }

}
