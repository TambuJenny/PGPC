<?php

namespace App\Helper;

use App\Models\nivelacesso as ModelsNivelacesso;
use App\Models\Nivelacesso;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\User;

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
}
