<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helper\ControloNivelAcesso;
use App\Repository\SessaoRepository;
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

    public function GetAllAtividades()
    {
        return Response()->json(SessaoRepository::GetAllData());
    }
}
