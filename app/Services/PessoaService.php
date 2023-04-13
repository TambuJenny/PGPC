<?php
use App\Models\Pessoa;

class PessoaService {

public function CadastrarPessoa(PessoaDTO $pessoadto)
{
    if ($pessoadto != null )
    {
        $pessoa = new Pessoa;//endereco
        $pessoa -> nome = $pessoadto-> nome;
        $pessoa -> data_nascimento = $pessoadto->data_nascimento;
        $pessoa -> endereco = $pessoadto->endereco;
        $pessoa -> telefone = $pessoadto->telefone;
        $pessoa -> bi = $pessoadto->bi;
        $pessoa -> email = $pessoadto->email;
        $pessoa ->save();
    }
}

}
