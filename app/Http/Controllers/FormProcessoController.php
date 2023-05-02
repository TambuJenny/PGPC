<?php

namespace App\Http\Controllers;

use App\DTO\PeticaoDTO;
use App\Http\Controllers\Controller;
use App\Services\PeticaoService;
use App\Services\ProcessoService;
use Illuminate\Http\Request;

class FormProcessoController extends Controller
{
   
    public function processo(){
        return view('pages.FormulariosProcesso.formProcesso');
     }

     public function peticao()
     {

        return view('pages.FormulariosProcesso.formPeticao',['idprocesso'=> ProcessoService::PegarUltimoId('processo')]);
     }

     public function CadastrarPeticao(Request $request)
     {
      $peticao = new PeticaoDTO ();
      $peticaoService = new PeticaoService ();

      $peticao -> nome = $request -> input('nome');
      $peticao -> email = $request -> input('email');
      $peticao -> sexo = $request -> input('sexo');
      $peticao -> endereco = $request -> input('endereco');
      $peticao -> data_nascimento = $request -> input('data_nascimento');
      $peticao -> telefone = $request -> input('telefone');
      $peticao -> bi = $request -> input('bi'); 
      $peticao -> DescricaoCrime = $request -> input('descricaoCrime'); 

      $idPeticao = $peticaoService ->CadastrarPeticao($peticao);

      $valorRetornado = [
         'idPeticao' =>  $idPeticao
      ];


      return view('pages.FormulariosProcesso.formVitima', $valorRetornado);
     }

     public function reu(){
        return view('pages.FormulariosProcesso.formReu');
     }

     public function depoimento(){
        return view('pages.FormulariosProcesso.formDepoimento');
     }

     public function autor(){
        return view('pages.FormulariosProcesso.formAutor');
     }
     public function vitima(){
        return view('pages.FormulariosProcesso.formVitima');
     }
}
