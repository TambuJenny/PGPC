<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormProcessoController extends Controller
{
   
    public function processo(){
        return view('pages.FormulariosProcesso.formProcesso');
     }

     public function peticao(){
        return view('pages.FormulariosProcesso.formPeticao');
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
