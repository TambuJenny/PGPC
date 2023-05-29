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

    public static function FindAllVitima()
    {
        $query = DB::table('pessoa')
        ->join('vitima',function($join){
            $join -> on('pessoa.id','=','vitima.id_pessoa');
        })
        ->join('peticao',function($join){
            $join -> on('peticao.id','=','vitima.id_peticao');
        })->join('Processo',function($join){
            $join -> on('processo.id_Peticao','=','peticao.id');
        })
        
        ->select(
            'pessoa.nome',
            'peticao.id as idPeticao',
            'pessoa.id as idPessoa',
            'pessoa.bi',
            'pessoa.endereco',
            'pessoa.data_nascimento',
            'pessoa.telefone',
            'vitima.id_peticao',
            'vitima.id as id_vitima',
            'Processo.nome as nomeProcesso'
        )->get();

        return $query;
    }

    public static function FindVitimaDepoimento($idPessoa,$idpeticao)
    {
        $query = DB::table('pessoa')
        ->join('vitima',function($join){
            $join -> on('pessoa.id','=','vitima.id_pessoa');
        })
        ->join('depoimento',function($join){
            $join -> on('pessoa.id','=','depoimento.id_pessoa');
        })
        ->where('depoimento.id_peticao','=',$idpeticao)
        ->where('depoimento.id_pessoa','=',$idPessoa)
        ->where('vitima.id_pessoa','=',$idPessoa)
        ->select(
            'pessoa.nome',
            'pessoa.id',
            'pessoa.bi',
            'pessoa.telefone',
            'vitima.id_peticao',
            'vitima.id as id_vitima',
            'depoimento.descricao'
        )->get();

        return $query;
    }
}
