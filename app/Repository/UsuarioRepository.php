<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

class UsuarioRepository
{

   
    public static function FindById($idUsuario)
    {
        $verificarDadosLogin = DB::table('pessoa')
            ->join('usuarios', function ($join) {
                $join->on('pessoa.id', '=', 'usuarios.id_Pessoa');
            })
            ->where('usuarios.id', '=', $idUsuario)
            ->select(
                'pessoa.nome as Nome',
                'pessoa.email as Email',
                'pessoa.sexo as Sexo',
                'pessoa.endereco as Endereco',
                'pessoa.data_nascimento as DataNascimento',
                'pessoa.telefone as Telefone',
                'pessoa.bi as Bi',
                'usuarios.id as Id'
            )->get();

            return $verificarDadosLogin;
    }

    public static function FindAll()
    {
        $verificarDadosLogin = DB::table('pessoa')
            ->join('usuarios', function ($join) {
                $join->on('pessoa.id', '=', 'usuarios.id_Pessoa');
            })
            ->select(
                'pessoa.nome as Nome',
                'pessoa.email as Email',
                'pessoa.sexo as Sexo',
                'pessoa.endereco as Endereco',
                'pessoa.data_nascimento as DataNascimento',
                'pessoa.telefone as Telefone',
                'pessoa.bi as Bi',
                'usuarios.id as Id'
            )->get();

            return $verificarDadosLogin;
    }

    public static function FindByBI($bi)
    {
        $verificarDadosLogin = DB::table('pessoa')
            ->where('pessoa.bi', '=', $bi)
            ->select(
                'pessoa.id as Id'
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
