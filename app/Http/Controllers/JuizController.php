<?php

namespace App\Http\Controllers;

use App\DTO\JuizDTO;
use App\Helper\ControloNivelAcesso;
use App\Http\Controllers\Controller;
use App\Services\JuizService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JuizController extends Controller
{
    
    public function GetAllJuiz ()
    {
       
    }

    public function Index ()
    {
        return view ('pages.Juiz.NovoJuiz');
    }

    public function ListarJuiz ()
    {
        $juizService = new JuizService();
        return ControloNivelAcesso::verificarAcessoCliente(ControloNivelAcesso::pegarDadoClienteLogado(),"advogado") ?
        view('pages.Juiz.listarJuiz',["allJuiz"=>[$juizService ->BuscarJuiz()]]): 
        view('pages.AcessoNegado'); 
    }

    public function AddJuiz (Request $request)
    {
        $juizService = new JuizService ();
        $advogadoDto = new JuizDTO ();
  
        $advogadoDto ->bi = $request ->bi;
        $advogadoDto ->telefone = !isset($request ->telefone) ? "####" : $request ->telefone;
        $advogadoDto ->nome = $request ->nome;
        $advogadoDto ->nij = $request ->nij;
        $advogadoDto ->email =  !isset($request ->email) ? "####" : $request ->email;
        $advogadoDto ->sexo = $request ->sexo;
        $advogadoDto ->endereco = !isset($request ->endereco) ? "####" : $request ->endereco;
        $advogadoDto ->data_nascimento = !isset($request ->data_nascimento) ? Carbon::now(): $request ->data_nascimento;
       
        return Response()->json($juizService ->CadastrarJuiz($advogadoDto)); 
        
    }
}
