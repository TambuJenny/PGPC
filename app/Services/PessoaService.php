<?php

namespace App\Services;

use App\DTO\PessoaDTO;
use App\DTO\ResponseDTO;
use App\Models\Pessoa;

class PessoaService {

public function CadastrarPessoa(PessoaDTO $pessoadto)
{
    try 
    { 
        $id = 0;

        if ($pessoadto != null )
        {
            $pessoa = new Pessoa;
            $pessoa -> nome = $pessoadto-> nome;
            $pessoa -> data_nascimento = $pessoadto->data_nascimento;
            $pessoa -> endereco = $pessoadto->endereco;
            $pessoa -> telefone = $pessoadto->telefone;
            $pessoa -> bi = $pessoadto->bi;
            $pessoa -> email = $pessoadto->email;
            $pessoa ->save();
            $id = $pessoa->id;
           
        }

        return $id;

    } catch (\Exception $th) {

        $response = new ResponseDTO();

        $response ->message = $th -> getMessage();
        $response -> messageStatus = false;
        $response -> status = 'error';
    }
}
public function PegarPessoaPeloId($id)
{
    $pegarPessoa = Pessoa::find($id);
    return $pegarPessoa;
}

public function ApagarPessoaPeloId($id)
{
    $pegarPessoa = Pessoa::find($id);
    $pegarPessoa-> delete();
}

}