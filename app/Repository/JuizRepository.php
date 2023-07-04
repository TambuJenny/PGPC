<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
class JuizRepository {

    public static function FindAllJuizs()
    {
        $query = DB::table('pessoa')
        ->join('juiz',function($join){
            $join -> on('pessoa.id','=','juiz.id_pessoa');
        })
        ->select(
            'pessoa.nome',
            'pessoa.id',
            'pessoa.email as Email',
            'pessoa.sexo as Sexo',
            'pessoa.endereco as Endereco',
            'pessoa.data_nascimento as DataNascimento',
            'pessoa.bi',
            'pessoa.telefone',
            'juiz.nij',
            'juiz.id as idjuiz'
        )->get();

        return $query;
    }

    public static function FindJuizById($id_juiz)
    {
        $query = DB::table('pessoa')
        ->join('juiz',function($join){
            $join -> on('pessoa.id','=','juiz.id_pessoa');
        })
        ->where('juiz.id','=',$id_juiz)
        ->select(
            'pessoa.nome',
            'pessoa.id',
            'pessoa.bi',
            'juiz.nij'
        )->get();

        return $query;
    }

    public function BuscarJuizProcessoAtivo ($idprocesso)
    {
        $query = DB::table('pessoa')
        ->join('juiz',function($join){
            $join -> on('pessoa.id','=','juiz.id_pessoa');
        })
        ->join('juizprocesso',function($join){
            $join -> on('juiz.id','=','juizprocesso.idjuiz');
        })
        ->where('juizprocesso.idprocesso','=',$idprocesso,'&&','juizprocesso.estado','=','ativo')
        ->select(
            'pessoa.nome',
            'pessoa.id',
            'pessoa.bi',
            'juiz.nij'
        )->get();

        return $query;
    }

    public function BuscarJuizProcessoTodos ($idprocesso)
    {
        $query = DB::table('pessoa')
        ->join('juiz',function($join){
            $join -> on('pessoa.id','=','juiz.id_pessoa');
        })
        ->join('juizprocesso',function($join){
            $join -> on('juiz.id','=','juizprocesso.idjuiz');
        })
        ->where('juizprocesso.idprocesso','=',$idprocesso)
        ->select(
            'pessoa.nome',
            'pessoa.id',
            'pessoa.bi',
            'juiz.nij',
            'juizprocesso.estado',

        )->get();

        return $query;
    }
}
