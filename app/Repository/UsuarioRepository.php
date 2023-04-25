<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

class UsuarioRepository
{
    public static function FindById($idUsuario)
    {
        $verificarDadosLogin = DB::table('pessoas')
            ->join('usuarios', function ($join) {
                $join->on('pessoas.id', '=', 'usuarios.id_Pessoa');
            })
            ->where('usuarios.id', '=', $idUsuario)
            ->select(
                'pessoas.nome as Nome',
                'pessoas.email as Email',
                'pessoas.sexo as Sexo',
                'pessoas.endereco as Endereco',
                'pessoas.data_nascimento as DataNascimento',
                'pessoas.telefone as Telefone',
                'pessoas.bi as Bi',
                'usuarios.id as Id'
            )->get();

            return $verificarDadosLogin;
    }

    public static function FindIdPessoa($idUsuario)
    {
        $pegarIdPessoa = DB::table('usuarios')
            ->where('usuarios.id', '=', $idUsuario)
            ->select(
                'usuarios.id as Id',
                'usuarios.id_Pessoa as IdPessoa'
            )->get();

            return $pegarIdPessoa;
    } 
}
