<?php

namespace App\Services;

use App\DTO\AdvogadoDTO;
use App\DTO\PessoaDTO;
use App\DTO\ResponseDTO;
use App\Helper\ControloNivelAcesso;
use App\Models\Advogado;
use App\Models\AdvogadoProcesso;
use App\Models\Nivelacesso;
use App\Models\Pessoa;
use App\Models\Reu;
use App\Models\Sessao;
use App\Models\Vitima;
use App\Repository\AdvogadoRepository;
use App\Repository\UsuarioRepository;
use Illuminate\Support\Facades\DB;

class AdvogadoService
{

    public function CadastrarAdvogado(AdvogadoDTO $request)
    {
        try {
            if ($request != null) {

                $pessoa = new PessoaDTO;
                $advogadoModel = new Advogado();
                $pessoaServico = new pessoaService();

                $pessoa->nome = $request->nome;
                $pessoa->data_nascimento = $request->data_nascimento;
                $pessoa->endereco = $request->endereco;
                $pessoa->telefone = $request->telefone;
                $pessoa->bi = $request->bi;
                $pessoa->email = $request->email;

                $idPessoa = $pessoaServico->CadastrarPessoa($pessoa);

                $advogadoModel->nia = $request->nia;
                $advogadoModel->id_pessoa = $idPessoa;
                $advogadoModel->save();

                if (!isset($request ->id_processo))
                {
                    $advogadoProcesso = new AdvogadoProcesso();
                    $advogadoProcesso -> idprocesso = $request ->id_processo;
                    $advogadoProcesso -> idadvogado = $advogadoModel ->id;
                    $advogadoProcesso -> estado = "ativo";
                    
                    $advogadoProcesso ->save();
                }

                $mensagem = "Advogado Cadastrado com sucesso.";
                ControloNivelAcesso::Evento('Cadastrou advogado');

                return $mensagem;
            }
        } catch (\Throwable $th) {
            $mensagem =  $th ->getMessage(). $th ->getLine()  ;
            return $mensagem;
        }

    }

    public function BuscarAdvogado()
    {
        try {
            $pegarDadosUsuario = AdvogadoRepository::FindAllAdvogados();
            $pessoaDto = new AdvogadoDTO();
            $pessoaDtoArray = [] ;

            foreach ($pegarDadosUsuario as $key ) {

                $pessoaDto->bi = $key->bi;
                $pessoaDto->email = $key->Email;
                $pessoaDto->data_nascimento = $key->DataNascimento;
                $pessoaDto->endereco = $key->Endereco;
                $pessoaDto->nome = $key->nome;
                $pessoaDto->sexo = $key->Sexo;
                $pessoaDto->telefone = $key->telefone;
                $pessoaDto->id = $key->idAdvogado;
                $pessoaDto->nia = $key->nia;
                $pessoaDto->id_pessoa = $key->id;
                
                $pessoaDtoArray[] = $pessoaDto;
            }

            return $pessoaDtoArray;

        } catch (\Throwable $th) {

        }
    }

    

}