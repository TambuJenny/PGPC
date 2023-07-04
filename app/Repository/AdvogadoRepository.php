<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
class AdvogadoRepository {

    public static function FindAllAdvogados()
    {
        $query = DB::table('pessoa')
        ->join('advogado',function($join){
            $join -> on('pessoa.id','=','advogado.id_pessoa');
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
            'advogado.nia',
            'advogado.id as idAdvogado'
        )->get();

        return $query;
    }

    public static function FindAdvogadoById($id_advogado)
    {
        $query = DB::table('pessoa')
        ->join('Advogado',function($join){
            $join -> on('pessoa.id','=','advogado.id_pessoa');
        })
        ->where('Advogado.id','=',$id_advogado)
        ->select(
            'pessoa.nome',
            'pessoa.id',
            'pessoa.bi',
            'advogado.nia'
        )->get();

        return $query;
    }

    public static function FindAdvogadoProcesso($id_advogado,$idprocesso)
    {
        $query = DB::table('pessoa')
        ->join('Advogado',function($join){
            $join -> on('pessoa.id','=','advogado.id_pessoa');
        })
        ->join('advogadoProcesso',function($join){
            $join -> on('advogadoprocesso.idprocesso','=',$idprocesso);
        })
        ->where('Advogado.id','=',$id_advogado)
        ->select(
            'pessoa.nome',
            'pessoa.id',
            'pessoa.bi',
            'advogado.nia'
        )->get();

        return $query;
    }
}
