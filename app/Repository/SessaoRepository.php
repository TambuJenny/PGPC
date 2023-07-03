<?php

namespace App\Repository;

use App\Models\Sessao;
use Illuminate\Support\Facades\DB;

class SessaoRepository 
{
        public static function AddSessao ($accao)
        {
                $date = new DateTime() ;
                $sessao = new Sessao();
                $sessao -> nome = session()->get('Nome');;
                $sessao -> accao = $accao;
                $sessao -> datahora = '['. $date -> format('Y-m-d H:i:s').']';
                $sessao  ->save();
            
        }

        public static function getAllData ()
        {

        }
}
