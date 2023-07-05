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
use App\Models\Processo;
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

    public function VincularAdvogadoProcesso(AdvogadoDTO $dto)
    {
        
        if($dto ->nia != null || $dto -> id_peticao != null )
        {
            $advogadoProcesso = new AdvogadoProcesso ();
            $advogado = Advogado::where('nia',$dto ->nia)->get();
            $processo = Processo::where('id_Peticao',$dto ->id_peticao)->get();
            
            $idAdvogado = 0; 
            $idProcesso = 0;

            foreach ($advogado as $key ) {
                
                $idAdvogado = $key ->id;
            }
            foreach ($processo as $key ) {
                
                $idProcesso = $key ->id;
            }

            if ( isset($advogado) ) 
            {
                 $advogadoProcesso -> idadvogado = $idAdvogado;
                 $advogadoProcesso -> idprocesso = $idProcesso;
                 $advogadoProcesso -> idvitima = $dto->id_vitima;
                 $advogadoProcesso -> idreu = $dto->id_reu;
                 $advogadoProcesso -> estado = "ativo";
             
                 return $advogadoProcesso -> save();
 
            } else 
            {
                 return false;
            }
        }else
        {
            return false;
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