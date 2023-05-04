<?php

namespace App\Services;


use App\DTO\VitimaDTO;
use App\Models\Pessoa;
use App\Models\Vitima;
use App\Repository\UsuarioRepository;

use function PHPUnit\Framework\isNull;

class VitimaService
{

    public function CriarVitima(VitimaDTO $vitimaDTO)
    {
        $idPessoa = 0;

        var_dump('entrou!');
        $pessoa = new Pessoa;

        if ($vitimaDTO !=null) {
            $pessoa = new Pessoa();
            $vitima = new Vitima();

            $verificarExistePessoa = UsuarioRepository::FindByBI($vitimaDTO->bi);

            if ($verificarExistePessoa->count() > 0) {

                $idPessoa = $verificarExistePessoa->pluck('Id')[0];
                var_dump('entrou:'. $idPessoa);

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
        }else
        {
            var_dump('fodeuuuuuu');
        }
    }
}