<?php

namespace App\Services;

use App\DTO\AdvogadoDTO;
use App\DTO\PessoaDTO;
use App\DTO\ResponseDTO;
use App\Models\Advogado;
use App\Models\Pessoa;
use App\Models\Reu;
use App\Models\Vitima;
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

                $id_advogado = $advogadoModel->id;

                if ($request->id_reu != 0 && $request->id_vitima == 0) {
                    $reuModel = Reu::find($request->id_reu);
                    $reuModel->id_advogado = $id_advogado;
                    $reuModel->save();

                } else if ($request->id_reu == 0 && $request->id_vitima != 0) {
                    $reuModel = Vitima::find($request->id_vitima);
                    $reuModel->id_advogado = $id_advogado;
                    $reuModel->save();
                } else if ($request->id_reu == 0 && $request->id_vitima == 0) {
                    $reuModel = Vitima::find($request->id_vitima);
                    $reuModel->id_advogado = $id_advogado;
                    $reuModel->save();

                    $reuModel = Reu::find($request->id_reu);
                    $reuModel->id_advogado = $id_advogado;
                    $reuModel->save();
                }

                $mensagem = "Advogado Cadastrado com sucesso.";

                return $mensagem;
            }
        } catch (\Throwable $th) {
            $mensagem =  $th ->getMessage(). $th ->getLine()  ;
            return $mensagem;
        }

    }

    public function BuscarAdvogado()
    {

    }

    

}