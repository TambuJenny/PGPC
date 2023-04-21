<?php

namespace App\Services;

use App\DTO\ProcessoDTO;
use App\Models\Processo;

class ProcessoService {

public function CriarProcesso(ProcessoDTO $request)
{
    if (!is_null($request)) 
    {
         $model = new Processo();
         $model-> id_Reu = $request ->idReu;
         $model-> id_TipoCrime = $request -> idTipoCrime;
         $model-> Datahora = $request -> dataHora;
         $model -> localInicidente = $request -> localIncidente;
         $model -> relatorio = $request -> relatorio;
         $model -> evidencia = $request -> evidencia;
         $model -> save();
    }
}

}
