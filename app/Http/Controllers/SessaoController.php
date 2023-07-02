<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helper\ControloNivelAcesso;

use Illuminate\Http\Request;

class SessaoController extends Controller
{
    public function ListarSessoes ()
    {
        return 
        (ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"all")) ? 
        view('pages.Sessao.ListarSessoes') : 
        view('pages.AcessoNegado');
        
    }
}
