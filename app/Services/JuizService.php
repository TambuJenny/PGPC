<?php

namespace App\Services;

use App\DTO\JuizDTO;
use App\DTO\PessoaDTO;
use App\DTO\ResponseDTO;
use App\Helper\ControloNivelAcesso;
use App\Models\Juiz;
use App\Models\JuizProcesso;
use App\Models\Pessoa;
use App\Models\Reu;
use App\Models\Vitima;
use App\Repository\JuizRepository;
use App\Repository\UsuarioRepository;
use Illuminate\Support\Facades\DB;

class JuizService
{

    public function CadastrarJuiz(JuizDTO $request)
    {
        try {
            if ($request != null) {

                $pessoa = new PessoaDTO;
                $juizModel = new Juiz();
                $pessoaServico = new pessoaService();

                $pessoa->nome = $request->nome;
                $pessoa->data_nascimento = $request->data_nascimento;
                $pessoa->endereco = $request->endereco;
                $pessoa->telefone = $request->telefone;
                $pessoa->bi = $request->bi;
                $pessoa->email = $request->email;

                $idPessoa = $pessoaServico->CadastrarPessoa($pessoa);

                $juizModel->nij = $request->nij;
                $juizModel->id_pessoa = $idPessoa;
                $juizModel->save();

                if (!isset($request ->id_processo))
                {
                    $advogadoProcesso = new JuizProcesso();
                    $advogadoProcesso -> idprocesso = $request ->id_processo;
                    $advogadoProcesso -> idjuiz = $juizModel ->id;
                    $advogadoProcesso -> estado = "ativo";
                    
                    $advogadoProcesso ->save();
                }

                $mensagem = "Juiz Cadastrado com sucesso.";
                ControloNivelAcesso::Evento('Cadastrou peticao');
                
                return $mensagem;
            }
        } catch (\Throwable $th) {
            $mensagem =  $th ->getMessage(). $th ->getLine()  ;
            return $mensagem;
        }

    }

    public function BuscarJuiz()
    {
        try {
            $pegarDadosUsuario = JuizRepository::FindAllJuizs();
            $pessoaDto = new JuizDTO();

            $pessoaDto->bi = $pegarDadosUsuario->pluck('bi')->first();
            $pessoaDto->email = $pegarDadosUsuario->pluck('Email')->first();
            $pessoaDto->data_nascimento = $pegarDadosUsuario->pluck('DataNascimento')->first();
            $pessoaDto->endereco = $pegarDadosUsuario->pluck('Endereco')->first();
            $pessoaDto->nome = $pegarDadosUsuario->pluck('nome')->first();
            $pessoaDto->sexo = $pegarDadosUsuario->pluck('Sexo')->first();
            $pessoaDto->telefone = $pegarDadosUsuario->pluck('telefone')->first();
            $pessoaDto->id = $pegarDadosUsuario->pluck('idJuiz')->first();
            $pessoaDto->nij = $pegarDadosUsuario->pluck('nij')->first();
            $pessoaDto->id_pessoa = $pegarDadosUsuario->pluck('id')->first();
                
            return $pessoaDto;

        } catch (\Throwable $th) {

    }
    

}

public function AtualizarJuizProcesso ($idProcesso,$idJuiz)
{
    /*$juiz = new Juiz();
    $pegarJuizId = JuizRepository::*/

    
}

    

}