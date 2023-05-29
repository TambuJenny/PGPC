<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
class AdvogadoRepository {

    public static function FindAllAdvogados()
    {
        $query = DB::table('pessoa')
        ->join('Advogado',function($join){
            $join -> on('pessoa.id','=','advogado.id_pessoa');
        })
        ->select(
            'pessoa.nome',
            'pessoa.id',
            'pessoa.bi'
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
}
