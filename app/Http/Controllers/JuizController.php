<?php

namespace App\Http\Controllers;

use App\Helper\ControloNivelAcesso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JuizController extends Controller
{
    
    public function GetAllJuiz ()
    {
       
    }

    public function ListarJuiz ()
    {
        /*$advogadoService = new JuizService();
        return ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"advogado") ?
        view('pages.Juiz.listarJuiz',["allAdvogado"=>[$advogadoService ->BuscarAdvogado()]]): 
        view('pages.AcessoNegado'); */
    }

    public function CadastrarJuiz ()
    {
        return view('pages.Juiz.cadastrarJuiz');
    }



}
