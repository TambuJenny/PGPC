<?php

namespace App\Helper;

use App\DTO\SessaoDTO;
use App\Models\nivelacesso as ModelsNivelacesso;
use App\Models\Nivelacesso;
use App\Models\Sessao;
use App\Models\Usuario;
use App\Repository\SessaoRepository;
use DateTime;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Date;

class ControloNivelAcesso 
{
    public static function verificarAcessoCliente($idUser,$acesso)
    {
       try 
       {

            $getUser= Usuario::find($idUser);
            $getaAcesso =  Nivelacesso::find($getUser->idNivelAcesso);
        
            if($getaAcesso->acesso == "all")
                return true;

            $getAllAcesso = explode(',',$getaAcesso ->acesso);
            $returnValue = (in_array($acesso,$getAllAcesso)) ? true : false ;
        
            return $returnValue;

       } catch (\Throwable $th) {
            return redirect ('/');
       }
    }

    public static function pegarDadoClienteLogado()
    {
       try {
                return session()->get('IdUsuario');
       } catch (\Throwable $th) {
         return redirect ('/');
       }
    }

    public static function Evento($accao)
    {
        SessaoRepository::AddSessao($accao);
    }
}
