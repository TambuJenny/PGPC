<?php

namespace App\Services;

use App\DTO\ReuDTO;
use App\Models\Reu;

class ReuService {

    public function CadastrarReu(ReuDTO $request)
    {
        $id = 0;
        if(!is_null($request))
        {
            $model = new Reu();
            $model -> id_pessoa = $request ->idPessoa;
            $model -> url_imageFoto = $request -> urlImage;
            $model -> save();
            $id = $model ->id;  
        }
        return  $id;
        
    }
}
