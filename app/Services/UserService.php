<?php

namespace App\Services;

use App\DTO\ResponseDTO;
use App\DTO\LoginDTO;
use App\DTO\PessoaDTO;
use App\DTO\UsuarioDTO;
use App\Models\Pessoa;
use App\Models\User;
use App\Models\Usuario;
use App\Repository\UsuarioRepository;
use App\Services\pessoaService;
use Illuminate\Support\Facades\DB;

class UserService
{

    public function CriarUsuario(PessoaDTO $pessoaDTO, UsuarioDTO $usuarioDTO)
    {
        $response = new ResponseDTO();
        try {
            $pessoaService = new pessoaService();
            $usuarioModel = new Usuario();
            $usuarioModel = new Usuario();

            $pessoaId = $pessoaService->CadastrarPessoa($pessoaDTO);
            $usuarioModel->senha = $usuarioDTO->senha;
            $usuarioModel->id_pessoa = $pessoaId;

            if ($pessoaId == null) {

                $response->message = 'Usuario já existe';
                $response->messageStatus = false;
                $response->status = 'error';
                return $response;
            }

            $messageStatus = $usuarioModel->save();

            $response->message = 'Usuario criado com sucesso!';
            $response->messageStatus = $messageStatus;
            $response->status = 'sucess';

            return $response;

        } catch (\Exception $th) {

            $response->message = $th->getMessage();
            $response->messageStatus = false;
            $response->status = 'sucess';

            return $response;
        }
    }

    public function LoginUsuario(LoginDTO $login)
    {
        $response = new ResponseDTO();

        $verificarDadosLogin = DB::table('pessoa')
            ->join('usuarios', function ($join) {
                $join->on('pessoa.id', '=', 'usuarios.id_Pessoa');
            })
            ->where('pessoa.email', '=', $login->email)
            ->where('usuarios.senha', '=', $login->senha)
            ->select(
                'pessoa.nome as Nome',
                'pessoa.email as Email',
                'pessoa.endereco as Endereco',
                'pessoa.data_nascimento as DataNascimento',
                'pessoa.telefone as Telefone',
                'pessoa.bi as Bi',
                'usuarios.id as Id'
            )->get();

        if ($verificarDadosLogin->count() == 0) {

            $response->message = "Email ou Senha inválido";
            $response->messageStatus = false;
            $response->status = 'error';

        } else {

            session()->put('Nome', $verificarDadosLogin->pluck('Nome')->first());
            session()->put('Email', $verificarDadosLogin->pluck('Email')->first());
            session()->put('IdUsuario', $verificarDadosLogin->pluck('Id')->first());

            $response->message = "Email e Senha válido";
            $response->messageStatus = true;
            $response->status = 'sucess';
        }

        return $response;
    }

    public function BuscarUsuarioPeloId($idUsuario)
    {
        try {
            $pegarDadosUsuario = UsuarioRepository::FindById($idUsuario);
            $pessoaDto = new PessoaDTO();

            $pessoaDto->bi = $pegarDadosUsuario->pluck('Bi')->first();
            $pessoaDto->email = $pegarDadosUsuario->pluck('Email')->first();
            $pessoaDto->data_nascimento = $pegarDadosUsuario->pluck('DataNascimento')->first();
            $pessoaDto->endereco = $pegarDadosUsuario->pluck('Endereco')->first();
            $pessoaDto->nome = $pegarDadosUsuario->pluck('Nome')->first();
            $pessoaDto->sexo = $pegarDadosUsuario->pluck('Sexo')->first();
            $pessoaDto->telefone = $pegarDadosUsuario->pluck('Telefone')->first();
            $pessoaDto->id = $pegarDadosUsuario->pluck('Id')->first();
                
            return $pessoaDto;

        } catch (\Throwable $th) {

        }
    }

    public function BuscarTodosUsuario()
    {
        try {
            $pegarDadosUsuario = UsuarioRepository::FindAll();
            $pessoaDto = new UsuarioDTO();

            $pessoaDto->bi = $pegarDadosUsuario->pluck('Bi')->first();
            $pessoaDto->email = $pegarDadosUsuario->pluck('Email')->first();
            $pessoaDto->data_nascimento = $pegarDadosUsuario->pluck('DataNascimento')->first();
            $pessoaDto->endereco = $pegarDadosUsuario->pluck('Endereco')->first();
            $pessoaDto->nome = $pegarDadosUsuario->pluck('Nome')->first();
            $pessoaDto->sexo = $pegarDadosUsuario->pluck('Sexo')->first();
            $pessoaDto->telefone = $pegarDadosUsuario->pluck('Telefone')->first();
            $pessoaDto->id = $pegarDadosUsuario->pluck('Id')->first();
            $pessoaDto->nivelAcesso = $pegarDadosUsuario->pluck('NivelAcesso')->first();
            $pessoaDto->estado = $pegarDadosUsuario->pluck('Estado')->first();
                
            return $pessoaDto;

        } catch (\Throwable $th) {

        }
    }

    public function EditarUsuario(PessoaDTO $pessoaDTO, UsuarioDTO $usuarioDTO)
    {
        $response = new ResponseDTO();
        try {
            $pessoaService = new pessoaService();
            $userId = $pessoaService->EditarPessoa($pessoaDTO);

            $usuarioModel = Usuario::find( $userId);
            $usuarioModel->senha = $usuarioDTO->senha;

           if($usuarioModel->save())
           {
                echo '<div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                      <div class="toast-body">
                            Dados atualizado com sucesso!
                      </div>
                      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>';

                session()->put('Nome', $pessoaDTO->nome);
                session()->put('Email', $pessoaDTO->email);
                session()->put('IdUsuario', $userId);
           }

            return $userId;

        } catch (\Exception $th) {

            echo '<div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                      <div class="toast-body">
                          Erro na atualização de dados.
                      </div>
                      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>';
        }
    }
}