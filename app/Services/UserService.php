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
use Illuminate\Support\Facades\DB;

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
        $response = new ResponseDTO();

        $verificarDadosLogin = DB::table('pessoas')
        -> join('usuarios', function($join){
            $join -> on('pessoas.id','=','usuarios.id_Pessoa');
        })
        -> where('pessoas.email','=',$login->email)
        -> where('usuarios.senha','=',$login ->senha)
        -> select(
            'pessoas.nome as Nome',
            'pessoas.email as Email',
            'pessoas.endereco as Endereco',
            'pessoas.data_nascimento as DataNascimento',
            'pessoas.telefone as Telefone',
            'pessoas.bi as Bi',
            'usuarios.id as Id'
        )-> get();

        if ($verificarDadosLogin ->count()==0) {
           
            $response ->message = "Email ou Senha inválido";
            $response -> messageStatus = false;
            $response -> status = 'error';

        } else {
           
            session()->put('Nome',$verificarDadosLogin->pluck('Nome')->first());
            session()->put('Email',$verificarDadosLogin->pluck('Email')->first());
            session()->put('IdUsuario',$verificarDadosLogin->pluck('Id')->first());
           
            $response ->message = "Email e Senha válido";
            $response -> messageStatus = true;
            $response -> status = 'sucess';
        }
        
        return $response;
    }
}
