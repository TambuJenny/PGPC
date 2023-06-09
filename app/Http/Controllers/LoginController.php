<?php

namespace App\Http\Controllers;

use App\DTO\LoginDTO;
use Illuminate\Http\Request;
use App\DTO\PessoaDTO;
use App\DTO\UsuarioDTO;
use App\DTO\ResponseDTO;
use App\Services\UserService;


class LoginController extends Controller
{
    public function Index()
    {
        return View('index');
    }
    public function Menu()
    {
        return View('pages.menu');
    }
    public function NewAccount()
    {
        $response = new ResponseDTO;

        $response ->message ='lorem';
        $response ->messageStatus = true;

        return View('pages.newAccount',['response' => $response]);
    }
    public function CriarConta(Request $request)
    {
        $pessoa = new PessoaDTO();
        $user = new UsuarioDTO();

        $pessoa -> nome = $request -> input('nome');
        $pessoa -> email = $request -> input('email');
        $pessoa -> sexo = $request -> input('sexo');
        $pessoa -> endereco = $request -> input('endereco');
        $pessoa -> data_nascimento = $request -> input('data_nascimento');
        $pessoa -> telefone = $request -> input('telefone');
        $pessoa -> bi = $request -> input('bi');  
        $user -> senha = $request -> input('senha');

        $userServices = new UserService(); 
        $verificacaoDoCadastro = $userServices ->CriarUsuario($pessoa,$user);

        if ($verificacaoDoCadastro ->messageStatus == true) 
            return View('index',['response' => $verificacaoDoCadastro]);
         else
            return View('pages.newAccount',['response' => $verificacaoDoCadastro]);
    }

    public function Login (Request $request)
    {
        $userLogin = new LoginDTO();
        $userServices = new UserService(); 

        $userLogin -> email = $request -> email;
        $userLogin -> senha = $request ->senha;

        $verificacaoDoLogin = $userServices ->LoginUsuario($userLogin);
        $dados = ['response' => $verificacaoDoLogin];

        if ($verificacaoDoLogin ->messageStatus == true)
        { 
            return View('pages.menu',compact('verificacaoDoLogin'))->with('layouts.menu',['response' => $verificacaoDoLogin]);
        }else
            return View('index',['response' => $verificacaoDoLogin]);
        
    }
}
