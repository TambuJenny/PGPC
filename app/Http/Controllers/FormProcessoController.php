<?php

namespace App\Http\Controllers;

use App\DTO\BuscarTodasVitimasDTO;
use App\DTO\PeticaoDTO;
use App\DTO\Request\BuscarTodasVitimasRequest;
use App\DTO\Request\DepoimentoRequest;
use App\DTO\ReuDTO;
use App\DTO\VitimaDTO;
use App\Http\Controllers\Controller;
use App\Models\Depoimento;
use App\Services\PeticaoService;
use App\Services\ProcessoService;
use App\Services\ReuService;
use App\Services\VitimaService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\VarDumper;

class FormProcessoController extends Controller
{

   public function processo()
   {
      return view('pages.FormulariosProcesso.formProcesso', ['idprocesso' => ProcessoService::PegarUltimoId('processo')]);
   }

   public function peticao()
   {

      return view('pages.FormulariosProcesso.formPeticao', ['idprocesso' => ProcessoService::PegarUltimoId('processo')]);
   }

   public function CadastrarPeticao(Request $request)
   {
      $peticao = new PeticaoDTO();
      $peticaoService = new PeticaoService();

      $peticao->nome = $request->input('nome');
      $peticao->email = $request->input('email');
      $peticao->sexo = $request->input('sexo');
      $peticao->endereco = $request->input('endereco');
      $peticao->data_nascimento = $request->input('data_nascimento');
      $peticao->telefone = $request->input('telefone');
      $peticao->bi = $request->input('bi');
      $peticao->DescricaoCrime = $request->input('descricaoCrime');

      $idPeticao = $peticaoService->CadastrarPeticao($peticao);


      $queryString = "/cadastrarVitima?idpeticao=" . $idPeticao;

      return redirect($queryString, 302);
   }

   public function reu()
   {
      return view('pages.FormulariosProcesso.formReu');
   }

   public function CadastrarReu(Request $request)
   {
      $reuDTO = new ReuDTO();
      $reuService = new ReuService();

      $reuDTO->nome = $request->input('nome');
      $reuDTO->email = $request->input('email');
      $reuDTO->sexo = $request->input('sexo');
      $reuDTO->endereco = $request->input('endereco');
      $reuDTO->data_nascimento = $request->input('data_nascimento');
      $reuDTO->telefone = $request->input('telefone');
      $reuDTO->bi = $request->input('bi');
      $reuDTO->id_peticao = $request->input('id_peticao');
      $reuDTO->url_imageFoto = $request->file('fotoReu')->store('caminho/da/pasta');

      $vitima = $reuService->CadastrarReu($reuDTO);

      $queryString = "/cadastrarVitima?idpeticao=" . $reuDTO->id_peticao;

      return redirect($queryString, 302);
   }

   public function depoimento()
   {
      return view('pages.FormulariosProcesso.formDepoimento');
   }

   public function autor()
   {
      return view('pages.FormulariosProcesso.formAutor');
   }
   public function vitima(Request $request)
   {

      return view('pages.FormulariosProcesso.formVitima', ['idprocesso' => ProcessoService::PegarUltimoId('processo'), 'idpeticao' => $request->query('idpeticao')]);
   }
   public function CadastrarVitima(Request $request)
   {
      $vitimadto = new VitimaDTO();
      $vitimaService = new VitimaService();

      $vitimadto->nome = $request->input('nome');
      $vitimadto->email = $request->input('email');
      $vitimadto->sexo = $request->input('sexo');
      $vitimadto->endereco = $request->input('endereco');
      $vitimadto->data_nascimento = $request->input('data_nascimento');
      $vitimadto->telefone = $request->input('telefone');
      $vitimadto->bi = $request->input('bi');

      $vitimadto->id_peticao = $request->input('id_peticao');

      $vitima = $vitimaService->CriarVitima($vitimadto);

      $queryString = "/cadastrarVitima?idpeticao=" . $vitimadto->id_peticao;
      return redirect($queryString, 302);
   }

   public function BuscarTodasvitimas($idpeticao)
   {
      $vitimaService = new VitimaService();
      $returnjson = $vitimaService->BuscarTodasVitimas($idpeticao);
      return response()->json($returnjson);
   }

   public function Cadastrardepoimento (Request $request)
   {
         $depoimento = new Depoimento();

         $depoimento ->Descricao = $request -> depoimento;
         $depoimento ->id_pessoa = $request -> id_pessoa;
         $depoimento ->Endereco = "teste";
         $depoimento ->id_peticao = $request -> id_peticao;
         $depoimento -> save();

         return response()->json(['mensagem' => 'Depoimento cadastrado com sucesso!'], Response::HTTP_OK);

   }

}
