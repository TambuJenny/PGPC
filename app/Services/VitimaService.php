<?php

namespace App\Services;


use App\DTO\Response\BuscarTodasVitimasResponse;
use App\DTO\VitimaDTO;
use App\Models\Pessoa;
use App\Models\Vitima;
use App\Repository\UsuarioRepository;
use App\Repository\VitimaRepository;
use PhpParser\Node\Expr\Throw_;

use TheSeer\Tokenizer\Exception;
use function PHPUnit\Framework\isNull;

class VitimaService
{

    public function CriarVitima(VitimaDTO $vitimaDTO)
    {
        $idPessoa = 0;

        var_dump('entrou!');
        $pessoa = new Pessoa;

        if ($vitimaDTO != null) {
            $pessoa = new Pessoa();
            $vitima = new Vitima();

            $verificarExistePessoa = UsuarioRepository::FindByBI($vitimaDTO->bi);

            if ($verificarExistePessoa->count() > 0) {

                $idPessoa = $verificarExistePessoa->pluck('Id')[0];

            } else {
                $pessoa->nome = $vitimaDTO->nome;
                $pessoa->data_nascimento = $vitimaDTO->data_nascimento;
                $pessoa->endereco = $vitimaDTO->endereco;
                $pessoa->telefone = $vitimaDTO->telefone;
                $pessoa->bi = $vitimaDTO->bi;
                $pessoa->email = $vitimaDTO->email;
                $pessoa->save();
                $idPessoa = $pessoa->id;
            }

            $vitima->id_peticao = $vitimaDTO->id_peticao;
            $vitima->id_pessoa = $idPessoa;
            $vitima->save();

            return $vitima->id;
        } else {

            throw new Exception("Error Processing Request", 1);
            
        }
    }

    public function BuscarTodasVitimas($idPeticao)
    {
        $query = VitimaRepository::FindByIdPeticao($idPeticao);
        $resposta = [];
            
        foreach ($query as $key) {
            $respostaquery = new BuscarTodasVitimasResponse();
            
            $respostaquery -> bi = $key ->bi;
            $respostaquery -> id_peticao = $key ->id_peticao;
            $respostaquery -> nome = $key->nome;
            $respostaquery -> telefone = $key->telefone;
            $respostaquery -> id_vitima = $key->id_vitima;
            
            $resposta[] =  $respostaquery;

        }
        return $resposta;
    }
}