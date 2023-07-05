<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
class ProcessoRepository {

    public static function FindAllProcesso()
    {
        $query = DB::table('Processo')
        ->join('peticao',function($join){
            $join -> on('peticao.id','=','Processo.id_Peticao');
        })
        ->join('tipocrime',function($join){
            $join -> on('tipocrime.id','=','Processo.id_tipoCrime');
        })
        ->join('autorpeticao',function($join){
            $join -> on('peticao.id_autorPeticao','=','autorpeticao.id');
        })
        ->join('pessoa',function($join){
            $join -> on('pessoa.id','=','autorpeticao.id_Pessoa');
        })
        ->select(
            'Processo.id as idProcesso',
            'peticao.id as idPeticao',
            'tipocrime.nome as tipoCrime',
            'Processo.nome as nomeProcesso',
            'Processo.created_at as datacriacao',
            'pessoa.nome as peticionario'
           
        )->get();

        return $query;
    }

}
