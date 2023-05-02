<?php

namespace App\Services;

use App\DTO\ProcessoDTO;
use App\Models\Processo;
use Illuminate\Support\Facades\DB;

class ProcessoService
{

    public function CriarProcesso(ProcessoDTO $request)
    {
        if (!is_null($request)) {
            $model = new Processo();
            $model->id_Reu = $request->idReu;
            $model->id_TipoCrime = $request->idTipoCrime;
            $model->Datahora = $request->dataHora;
            $model->localInicidente = $request->localIncidente;
            $model->relatorio = $request->relatorio;
            $model->evidencia = $request->evidencia;
            $model->save();
        }
    }

    public static function PegarUltimoId($value)
    {
        $ultimo_id = DB::table($value)->latest()->value('id');
        return $ultimo_id == null ? 1 :$ultimo_id;
    }

}