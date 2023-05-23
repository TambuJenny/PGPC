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

class AdvogadoService {

public function CadastrarAdvogado (AdvogadoDTO $request )
{
    if($request != null)
    {
        $pessoa = new PessoaDTO;
        $advogadoModel = new Advogado();
        $pessoaServico = new pessoaService();

        $pessoa -> nome = $request-> nome;
        $pessoa -> data_nascimento = $request->data_nascimento;
        $pessoa -> endereco = $request->endereco;
        $pessoa -> telefone = $request->telefone;
        $pessoa -> bi = $request->bi;
        $pessoa -> email = $request->email;

        $idPessoa =  $pessoaServico ->CadastrarPessoa($pessoa);
        
        $advogadoModel -> nia = $request ->nia;
        $advogadoModel -> id_pessoa = $request ->$idPessoa;
        $advogadoModel ->save();

        $id_advogado = $advogadoModel -> id;

        if ($request ->id_reu != null && $request ->id_vitima == null ) 
        {
           $reuModel =Reu::find($request ->id_reu -> pluck('IdReu')->first());
           $reuModel -> id_advogado = $id_advogado;
           $reuModel ->save();

        }else if($request ->id_reu == null && $request ->id_vitima == null)  {

           $reuModel =Vitima::find($request ->id_vitima -> pluck('IdVitima')->first());
           $reuModel -> id_advogado = $id_advogado;
           $reuModel ->save();
        } else if (isset($request ->id_peticao))
        {
                
        }

        $id= $advogadoModel ->id;

        return $id;
    }

}

public function  BuscarAdvogados ()
{

}

}
