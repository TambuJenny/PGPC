<?php

namespace App\Services;

use App\DTO\ResponseDTO;
use App\DTO\ReuDTO;
use App\Models\Reu;
use App\Models\Vitima;

class ReuService {

    public function CadastrarReu(ReuDTO $request)
    {
        
    try 
    { 
        $id = 0;

        if ($request != null )
        {
            $reu = new Reu ();
            $reu -> nome = $request-> nome;
            $reu -> data_nascimento = $request->data_nascimento;
            $reu -> endereco = $request->endereco;
            $reu -> telefone = $request->telefone;
            $reu -> sexo = $request->sexo;
            $reu -> bi = $request->bi;
            $reu -> email = $request->email;
            $reu -> id_peticao = $request->id_peticao;
            $reu -> url_imageFoto = $request->url_imageFoto;  
            $reu ->save();

            $id = $reu->id;
        }

        return $id;

    } catch (\Exception $th) {

        var_dump($th);
        $response = new ResponseDTO();

        $response ->message = $th -> getMessage();
        $response -> messageStatus = false;
        $response -> status = 'error';
    }
        
    }
}
