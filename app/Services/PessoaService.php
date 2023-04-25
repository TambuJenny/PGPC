<?php

namespace App\Services;

use App\DTO\PessoaDTO;
use App\DTO\ResponseDTO;
use App\Models\Pessoa;
use App\Repository\UsuarioRepository;

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
        var_dump($id);
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

public function EditarPessoa(PessoaDTO $pessoadto)
{
    try 
    { 
        $id = 0;

        if ($pessoadto != null )
        {
            $idPessoa = UsuarioRepository::FindIdPessoa($pessoadto->id);
            var_dump("aqui!");
            $pessoa = Pessoa::find( $idPessoa -> pluck('IdPessoa')->first());
            $pessoa -> nome = $pessoadto-> nome;
            $pessoa -> data_nascimento = $pessoadto->data_nascimento;
            $pessoa -> endereco = $pessoadto->endereco;
            $pessoa -> telefone = $pessoadto->telefone;
            $pessoa -> bi = $pessoadto->bi;
            $pessoa -> email = $pessoadto->email;
            
            $retorno = $pessoa ->save();

            if ( $retorno) {
               
                var_dump("Deu certo o update");
            }

            $id = $pessoadto->id;
        }
        var_dump("id=".$id);
        return $id;

    } catch (\Exception $th) {

        $response = new ResponseDTO();

        $response ->message = $th -> getMessage();
        $response -> messageStatus = false;
        $response -> status = 'error';
    }
}

}
