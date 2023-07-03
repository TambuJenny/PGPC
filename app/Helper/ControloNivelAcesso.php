<?php

namespace App\Helper;

use App\DTO\SessaoDTO;
use App\Models\nivelacesso as ModelsNivelacesso;
use App\Models\Nivelacesso;
use App\Models\Sessao;
use App\Models\Usuario;
use DateTime;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Date;

class ControloNivelAcesso 
{
    public static function verificarAcessoCliente($idUser,$acesso)
    {
        $getUser= Usuario::find($idUser);
        
        $getaAcesso =  Nivelacesso::find($getUser->idNivelAcesso);
       

        if($getaAcesso->acesso == "all")
            return true;
        
        $getAllAcesso = explode(',',$getaAcesso ->acesso);
        $returnValue = (in_array($acesso,$getAllAcesso)) ? true : false ;


        return $returnValue;
    }

    public static function pegarDadoClienteLogado()
    {
        return session()->get('IdUsuario');
    }

    public static function Sessao($accao)
    {
        $date = new DateTime ;
        $sessao = new Sessao();
        $sessao -> nome = session()->get('Nome');;
        $sessao -> accao = $accao;
        $sessao -> datahora = '['. $date -> format('Y-m-d H:i:s').']';
        $sessao  ->save();
    }
}
