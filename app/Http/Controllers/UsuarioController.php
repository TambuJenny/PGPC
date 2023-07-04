<?php

namespace App\Http\Controllers;

use App\DTO\PessoaDTO;
use App\DTO\ResponseDTO;
use App\DTO\UsuarioDTO;
use App\Helper\ControloNivelAcesso;
use App\Http\Controllers\Controller;
use App\Models\Nivelacesso;
use App\Models\Usuario;
use App\Services\UserService;
use Facade\FlareClient\Http\Response;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Psy\Util\Json;

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
        ControloNivelAcesso::Evento('Cadastrou peticao');
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
            return view('editarUsuario?idUsuario='.$pessoaId);
            ControloNivelAcesso::Evento('Cadastrou peticao');
    
        
        } catch (\Throwable $th) {

            $response->message = "Erros ao atualizar dados";
            $response->messageStatus = false;
            $response->status = 'error';
            
            session()->put('responseStatus', $response->messageStatus);
            return redirect('editarUsuario?idUsuario='.$pessoaId);
        }
    }

    public function UpdateUserioEstado(Request $request)
    {
        $usuario = Usuario::find($request->idUsuario);
        $usuario -> estado = $request -> estado;
        $valor = $usuario ->save();
        
        $obj =[
            'response'=> $valor
        ];

        return Response ()->json($obj);
    }

    public function UpdateUserioNivelAcesso(Request $request)
    {
        $usuario = Usuario::find($request->idUsuario);
        $usuario -> idNivelAcesso = $request -> idNivelAcesso;
        $valor = $usuario ->save();
        
        $obj =[
            'response'=> $valor
        ];

        return Response ()->json($obj);
    }


    public function GetAllUsuario ()
    {
        $usuarioService = new UserService () ;

         return (ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"all"))?
             response()->json($usuarioService->BuscarTodosUsuario()) :
             response()->json(["error"=>"Acesso Negado"],404);
    }

    public function ListarUsuario ()
    {
        $usuarioService = new UserService () ;
        $getAllNivelAcesso = Nivelacesso::all();

        return 
        (ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"all")) ? 
        view('pages.usuario.ListarUsuario',["allUsuarios" => [$usuarioService->BuscarTodosUsuario()],"allNivelAcesso"=>$getAllNivelAcesso ]) : 
        view('pages.AcessoNegado');
    }
}
