<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ReuRepository {
    
    public static function FindAll()
    {
        $query = DB::table('Reu')
        ->join('Peticao',function($join){
            $join -> on('peticao.id','=','reu.id_peticao');
        })->join('Processo',function($join){
            $join -> on('processo.id_Peticao','=','peticao.id');
        })
        ->select(
            'reu.nome',
            'reu.bi',
            'reu.endereco',
            'reu.data_nascimento',
            'reu.telefone',
            'reu.url_imageFoto',
            'reu.id as idReu',
            'Processo.nome as nomeProcesso',
            'peticao.id as idPeticao'
        )->get();

        return $query;
    }

    public static function FindbyIdPeticao($id)
    {
        $query = DB::table('Reu')
        ->join('peticao',function($join){
            $join -> on('peticao.id','=','reu.id_peticao');
        })
        ->where('reu.id_peticao','=',$id)
        ->select(
            'reu.nome',
            'reu.id',
            'reu.bi',
            'reu.endereco',
            'reu.data_nascimento',
            'reu.telefone',
            'reu.url_imageFoto'
        )->get();

        return $query;
    }
}
