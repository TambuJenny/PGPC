<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipoCrime;
use App\Repository\CrimeRepository;
use App\Repository\ProcessoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProcessoController extends Controller
{
    public function CriarProcesso ()
    {
        $pegarTodosTiposCrime = CrimeRepository::BuscarTodosTipoCrimes();
        
        return view('pages.processo')->with('pegarTodosTiposCrime', $pegarTodosTiposCrime);
    }

    public function CriarProcessoReu (Request $request)
    {
        
    }

    public function CriarPeticao ()
    {
        
    }

    public function BuscarProcesso()
    {
      return Response()->json(ProcessoRepository::FindAllProcesso());
    }

    public function BuscarTipoCrime()
    {
        $tipocrimeModal = new TipoCrime ();
      return Response()->json(TipoCrime::all());
    }
}
