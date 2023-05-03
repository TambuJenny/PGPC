<?php

namespace App\Services;

use App\DTO\ResponseDTO;
use App\DTO\LoginDTO;
use App\DTO\UsuarioDTO;
use App\DTO\VitimaDTO;
use App\Models\Pessoa;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Vitima;
use App\Repository\UsuarioRepository;
use App\Services\pessoaService;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class VitimaService
{

    public function CriarVitima(VitimaDTO $vitimaDTO)
    {
        $idPessoa = 0;
        if (!isNull($vitimaDTO)) 
        {
            $pessoa = new Pessoa();
            $vitima = new Vitima();

            $verificarExistePessoa = UsuarioRepository::FindByBI($vitimaDTO->bi);

            if ($verificarExistePessoa->count() > 0)
                $idPessoa = $verificarExistePessoa->pluck('Id')[0];
            else {
                $pessoa = new Pessoa;
                
                $pessoa->nome = $vitimaDTO->nome;
                $pessoa->data_nascimento = $vitimaDTO->data_nascimento;
                $pessoa->endereco = $vitimaDTO->endereco;
                $pessoa->telefone = $vitimaDTO->telefone;
                $pessoa->bi = $vitimaDTO->bi;
                $pessoa->email = $vitimaDTO->email;
                $pessoa->save();
                $idPessoa = $pessoa->id;
            }

            $vitima->id_peticao = $vitima->id_peticao;
            $vitima->id_pessoa = $vitima->$idPessoa;
            $vitima->save();

            return  $vitima->id;
        }
    }
}
