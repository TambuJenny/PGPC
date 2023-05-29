<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class PeticaoRepository {
    
    public static function FindAll()
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

    public static function FindbyIdPeticao($id)
    {
        $query = DB::table('Reu')
        ->join('pessoa',function($join){
            $join -> on('pessoa.id','=','reu.id_Pessoa');
        })
        ->where('reu.id_peticao','=',$id)
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
}
