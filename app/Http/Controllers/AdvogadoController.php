<?php

namespace App\Http\Controllers;

use App\DTO\AdvogadoDTO;
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
    }

    public function VincularAdvogadoProcesso (Request $body)
    {
        $advogadoService = new AdvogadoService ();
        $advogadoDTO = new AdvogadoDTO ();

        $advogadoDTO ->nia = $body ->nia;
        $advogadoDTO ->id_peticao = $body ->idPeticao;
        $advogadoDTO ->id_reu = $body ->idReu;
        $advogadoDTO ->id_vitima = $body ->idVitima;
        
        
        $messageResponse = $advogadoService ->VincularAdvogadoProcesso($advogadoDTO) ? "Advogado vinculado":"Erro ao vincular o advogado";

        if($messageResponse == "Advogado vinculado")
            ControloNivelAcesso::Evento('Vinculou o advogado no processo'.$advogadoDTO ->id_processo);
        ControloNivelAcesso::Evento('Erro ao vincular o advogado no processo'.$advogadoDTO ->id_processo);

        return Response()->json(['message'=> $messageResponse]);
        
    }

    public function BuscarAdvogadosProcesso (Request $request)
    {
        //return Response()->json(AdvogadoRepository::FindAdvogadoProcesso($request->idA));
    }

}
