<?php

namespace App\Http\Controllers;

use App\DTO\PessoaDTO;
use App\DTO\ResponseDTO;
use App\DTO\UsuarioDTO;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function EditarUsuario(Request $idUser)
    {
        $UsuarioService = new UserService ();
        $response = new ResponseDTO();

        $idUsuario = $idUser->query('idUsuario');
        $cabecalhoRespostaUpdateUsuario = $idUser->header('responseStatus');

        $pegarDadosUsuario = $UsuarioService ->BuscarUsuarioPeloId($idUsuario);
        
        if (!is_null(session('responseStatus')))
        {
                session()->put('responseStatus', null);
                $response->message = "Dados Atualizado";
                $response->messageStatus = true;
                $response->status = 'success';
                
                return view('pages.usuario.editarUsuario',['response'=>$pegarDadosUsuario,'responseStatus'=>$response]);
        }

        return view('pages.usuario.editarUsuario',['response'=>$pegarDadosUsuario]);
    }

    public function Editar(Request $request)
    {
        try {
          
            $response = new ResponseDTO();
            $pessoa = new PessoaDTO();
            $user = new UsuarioDTO();
            $UsuarioService = new UserService ();
    
            $pessoa -> nome = $request -> input('nome');
            $pessoa -> id = $request -> input('id');
            $pessoa -> email = $request -> input('email');
            $pessoa -> sexo = $request -> input('sexo');
            $pessoa -> endereco = $request -> input('endereco');
            $pessoa -> data_nascimento = $request -> input('data_nascimento');
            $pessoa -> telefone = $request -> input('telefone');
            $pessoa -> bi = $request -> input('bi');  
            $user -> senha = $request -> input('senha');
    
            $userServices = new UserService(); 
            $pessoaId = $userServices ->EditarUsuario($pessoa,$user);
            $pegarDadosUsuario = $UsuarioService ->BuscarUsuarioPeloId($pessoaId);
    
            if (!is_null($pessoaId)) {
               
                $response->message = "Dados Atualizado";
                $response->messageStatus = true;
                $response->status = 'success';
    
            } else {
    
                $response->message = "Erros ao atualizar dados";
                $response->messageStatus = false;
                $response->status = 'error';
            }
            
            session()->put('responseStatus', $response->messageStatus);
            return redirect('editarUsuario?idUsuario='.$pessoaId);
        
        } catch (\Throwable $th) {

            $response->message = "Erros ao atualizar dados";
            $response->messageStatus = false;
            $response->status = 'error';
            
            session()->put('responseStatus', $response->messageStatus);
            return redirect('editarUsuario?idUsuario='.$pessoaId);
        }
    }

    public function ApagarUsuario(){
        
    }

    public function GetAllUsuario ()
    {
       
    }

    public function ListarUsuario ()
    {
        return view('pages.usuario.ListarUsuario');
    }
}
