<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

class VitimasRespository
{
    public function Find()
    {
        $query = DB::table('Reu')
        ->join('pessoas',function($join){
            $join -> on('pessoas.id','=','reu.id_Pessoa');
        })
        ->where('pessoas.id','=','reu.id_Pessoa')
        ->select(
            'pessoas.nome',
            'pessoas.bi',
            'pessoas.endereco',
            'pessoas.data_nascimento',
            'pessoas.telefone',
            'reu.url_imageFoto'
        )->get();

        return $query;
    }
}
