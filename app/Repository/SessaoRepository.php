<?php

namespace App\Repository;

use App\Models\Sessao;
use DateTime;

class SessaoRepository 
{
        public static function AddSessao ($accao)
        {
                $sessao = new Sessao();
                $date = new DateTime() ;
                $nome = (session()->get('Nome')) == null ? '###': session()->get('Nome');

                $sessao -> nome = $nome;
                $sessao -> accao = $accao;
                $sessao -> datahora = '['. $date -> format('Y-m-d H:i:s').']';
                $sessao ->save();
        }

        public static function GetAllData ()
        {
            return Sessao::all(); 
        }
}
