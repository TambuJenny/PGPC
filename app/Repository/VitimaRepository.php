<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

class VitimaRepository
{
    public static function Find()
    {
        $query = DB::table('Reu')
        ->join('pessoa',function($join){
            $join -> on('pessoa.id','=','reu.id_Pessoa');
        })
        ->where('pessoa.id','=','reu.id_Pessoa')
        ->select(
            'pessoa.nome',
            'pessoa.bi',
            'pessoa.endereco',
            'pessoa.data_nascimento',
            'pessoa.telefone',
            'reu.url_imageFoto'
        )->get();

        return $query;
    }

    public static function FindByIdPeticao($idpeticao)
    {
        $query = DB::table('pessoa')
        ->join('vitima',function($join){
            $join -> on('pessoa.id','=','vitima.id_pessoa');
        })
        ->where('vitima.id_peticao','=',$idpeticao)
        ->select(
            'pessoa.nome',
            'pessoa.id',
            'pessoa.bi',
            'pessoa.telefone',
            'vitima.id_peticao',
            'vitima.id as id_vitima'
        )->get();

        return $query;
    }
}
