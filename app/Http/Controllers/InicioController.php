<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Locacao;

class InicioController extends Controller
{
    public function index()
    {
      $dataAtual = date("d/m/y");
      $diaSemana = date('w', time());
      $locacoes = Locacao::where('data','=',date("y/m/d"))->get();
      return view('inicio2')->with('dataAtual',$dataAtual)
                           ->with('diaSemana', $diaSemana)
                           ->with('locacoes',$locacoes);
    }
}
