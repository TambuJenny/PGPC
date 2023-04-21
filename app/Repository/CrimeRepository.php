<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
class CrimeRepository {

        public static function BuscarTodosTipoCrimes ()
        {
            return $TiposCrimes = DB::table('tipocrime')->select('tipocrime.id','tipocrime.nome')->get();
        }
}
