<?php

namespace App\Services;

use App\DTO\PessoaDTO;
use App\DTO\PeticaoDTO;
use App\DTO\ResponseDTO;
use App\Helper\ControloNivelAcesso;
use App\Models\AutorPeticao;
use App\Models\Pessoa;
use App\Models\Peticao;
use App\Repository\UsuarioRepository;

class PeticaoService {

public function CadastrarPeticao(PeticaoDTO $peticao)
{
    try 
    { 
        $idpeticao = 0;
        $idPessoa = 0;

        if ($peticao != null )
        {
            $pessoaService = new pessoaService ();
            $pessoa = new PessoaDTO;

            $verificarExistePessoa = UsuarioRepository::FindByBI($peticao->bi);

            if($verificarExistePessoa ->count()>0)
                $idPessoa = $verificarExistePessoa -> pluck('Id')[0];
            else
            {
                $pessoa -> nome = $peticao-> nome;
                $pessoa -> data_nascimento = $peticao->data_nascimento;
                $pessoa -> endereco = $peticao->endereco;
                $pessoa -> telefone = $peticao->telefone;
                $pessoa -> bi = $peticao->bi;
                $pessoa -> email = $peticao->email;
                
                $idPessoa =  $pessoaService ->CadastrarPessoa($pessoa);
               
            }

            $autorPeticao = new AutorPeticao ();
            $autorPeticao -> id_Pessoa = $idPessoa;
            $autorPeticao -> save();
            $idAutorPeticao = $autorPeticao -> id;

            $peticaomodel = new Peticao ();
            $peticaomodel -> descricaoCrime = $peticao->DescricaoCrime ;
            $peticaomodel -> id_autorPeticao = $idAutorPeticao ;
            $peticaomodel -> save();
            $idpeticao =  $peticaomodel-> id;
        }
        ControloNivelAcesso::Evento('Cadastrou peticao');

        return $idpeticao;

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

            if ($retorno) {
               
             }

            $id = $pessoadto->id;
        }

       
        return $id;

    } catch (\Exception $th) {

        $response = new ResponseDTO();

        $response ->message = $th -> getMessage();
        $response -> messageStatus = false;
        $response -> status = 'error';
    }
}

}
