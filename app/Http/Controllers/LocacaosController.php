<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Locacao;
use App\User;
use App\Recurso;
use Auth;

class LocacaosController extends Controller
{
  public function index()
  {
      $locacaos = Locacao::orderBy('data','asc')->get();
      return view('locacaos.index')->with('locacaos',$locacaos);;
  }

  public function create()
  {
      $user = User::all();
      $recurso = Recurso::all();
      return view('locacaos.create')->with('user',$user)
                                    ->with('recurso',$recurso);
  }

  public function storeData(Request $request)
  {
      Locacao::create($request->all());
      $data = $request->data;
      $dataInvertida = $request->data;
      $data = date('d/m/Y', strtotime($data));
      $diaSemana = date('w', time());
      $locacoes = Locacao::where('data','=',$dataInvertida)->get();
      return view('locacaos.showData')->with('dataAtual',$data)
                           ->with('diaSemana', $diaSemana)
                           ->with('locacoes',$locacoes)
                           ->with('dataInvertida',$dataInvertida);
  }

  public function store(Request $request)
  {
      Locacao::create($request->all());
      return redirect('/');
  }

  public function show($id)
  {
      $locacaos = Locacao::find($id);
      return view('locacaos.show')->with('locacaos',$locacaos);
  }

  public function showData(Request $request)
  {
      $data = $request->data;
      $dataInvertida = $request->data;
      $data = date('d-m-Y', strtotime($data));
      $diaSemana = date('w', time());
      $locacoes = Locacao::where('data','=',$dataInvertida)->get();
      return view('locacaos.showData')->with('dataAtual',$data)
                           ->with('diaSemana', $diaSemana)
                           ->with('locacoes',$locacoes)
                           ->with('dataInvertida',$dataInvertida);
  }

  public function edit($id)
  {
      $locacaos = Locacao::find($id);
      return view('locacaos.edit')->with('locacaos',$locacaos);
  }

  public function update(Request $request, $id)
  {
      $locacaos = Locacao::find($id);
      $locacaos->idUser = $request->idUser;
      $locacaos->idRecurso = $request->idRecurso;
      $locacaos->horario = $request->horario;
      $locacaos->data = $request->data;
      $locacaos->turno = $request->turno;
      $locacaos->save();
      return redirect('/locacaos');
  }

  public function destroy($id)
  {
      $locacaos = Locacao::find($id);
      $locacaos->delete();
      return redirect('/locacaos/marcacoes');
  }

  //retorna as marcacoes do usuario logado
  public function marcacoes()
  {
    $marcacoes = Locacao::orderBy('data','asc')->where([
                          ['idUser','=',Auth::user()->id],
                          ['data','>=',date("y/m/d")],
                          ])->get();
    return view('locacaos.marcacoes')->with('marcacoes',$marcacoes);
  }

}
