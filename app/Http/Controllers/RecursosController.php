<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recurso;

class RecursosController extends Controller
{
    public function index()
    {
        $recursos = Recurso::orderBy('nome','asc')->get();
        return view('recursos.index')->with('recursos',$recursos);
    }

    public function create()
    {
        return view('recursos.create');
    }

    public function store(Request $request)
    {
        Recurso::create($request->all());
        return redirect('/recursos');
    }

    public function show($id)
    {
        $recursos = Recurso::find($id);
        return view('recursos.show')->with('recursos',$recursos);
    }

    public function edit($id)
    {
        $recursos = Recurso::find($id);
        return view('recursos.edit')->with('recursos',$recursos);
    }

    public function update(Request $request, $id)
    {
        $recursos = Recurso::find($id);
        $recursos->nome = $request->nome;
        $recursos->descricao = $request->descricao;
        $recursos->save();
        return redirect('/recursos');
    }

    public function destroy($id)
    {
        $recursos = Recurso::find($id);
        $recursos->delete();
        return redirect('/recursos');
    }
}
