<?php

namespace App\Services;

use App\DTO\ProcessoDTO;
use App\Models\Processo;
use Illuminate\Support\Facades\DB;

class ProcessoService
{

    public function CriarProcesso( $idPeticao)
    {
        if (!is_null($idPeticao)) {
            $query = DB::table('processo')
            ->join('peticao',function($join){
                $join -> on('depoimento.id_peticao','=','reu.id_Pessoa');
            })
            ->join('depoimento',function($join){
                $join -> on('depoimento.id_peticao','=','reu.id_Pessoa');
            })
            ->where('reu.id_peticao','=',$idPeticao)
            ->select(
                'pessoa.nome',
                'pessoa.bi',
                'pessoa.endereco',
                'pessoa.data_nascimento',
                'pessoa.telefone',
                'reu.url_imageFoto'
            )->get();
        }
    }

    public static function PegarUltimoId($value)
    {
        $ultimo_id = DB::table($value)->latest()->value('id');
        return $ultimo_id == null ? 1 :$ultimo_id;
    }
    

}