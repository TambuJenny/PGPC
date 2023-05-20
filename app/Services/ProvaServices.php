<?php

namespace App\Services;

use App\DTO\ProcessoDTO;
use App\DTO\ProvaDTO;
use App\Models\Processo;
use App\Models\Prova;
use Illuminate\Support\Facades\DB;

class ProvaService
{
        public function CadastrarProva(ProvaDTO $provaDTO)
        {
             $prova = new Prova();
             $prova -> urlFile = $provaDTO-> urlfile;
             $prova -> descricao = $provaDTO-> descricao;
             $prova -> id_reu = $provaDTO-> idreu;
             $prova -> id_vitima = $provaDTO-> idvitima;
             $prova -> id_autorPeticao = $provaDTO-> idAutorPeticao;
             $prova -> save();
        }
}
