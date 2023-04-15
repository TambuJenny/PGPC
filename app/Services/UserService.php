<?php

namespace App\Services;

use App\DTO\ResponseDTO;
use App\DTO\LoginDTO;
use App\DTO\PessoaDTO;
use App\DTO\UsuarioDTO;
use App\Models\Pessoa;
use App\Models\User;
use App\Models\Usuario;
use App\Services\PessoaService;

class UserService {

   
    public function CriarUsuario(PessoaDTO $pessoaDTO, UsuarioDTO $usuarioDTO)
    {
        $response = new ResponseDTO();
        try 
        {
            $pessoaService = new PessoaService();
            $usuarioModel = new Usuario();

            $pessoaId = $pessoaService->CadastrarPessoa($pessoaDTO);
            $usuarioModel -> senha = $usuarioDTO -> senha;
            $usuarioModel -> id_pessoa = $pessoaId;
            
            if ($pessoaId == null) {

                $response ->message = 'Usuario já existe';
                $response -> messageStatus = false;
                $response -> status = 'error';
                return $response;
            }

            $messageStatus = $usuarioModel -> save();

            $response ->message = 'Usuario criado com sucesso!';
            $response -> messageStatus = $messageStatus;
            $response -> status = 'sucess';

            return $response;

        } catch (\Exception $th) {
            
            $response ->message = $th ->getMessage();
            $response -> messageStatus = false;
            $response -> status = 'sucess';

            return $response;
        }
    }

    public function LoginUsuario (LoginDTO $login)
    {
        $pessoaModel = new Pessoa();
        $pegarUsuario = $pessoaModel::find($login -> email);

        if (condition) {
            
            
        }
    }
}
