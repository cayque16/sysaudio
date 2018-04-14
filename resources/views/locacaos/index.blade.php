@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Lista de Todas Locações</h3>

  <table class="table table-condensed">
    <th>ID</th>
    <th>Usuário</th>
    <th>Recurso</th>
    <th>Horário</th>
    <th>Data</th>

    @foreach($locacaos as $l)
    <tr>
      <td>{{$l->id}}</td>
      <td>{{$l->user->name}}</td>
      <td>{{$l->recurso->nome}}</td>
      <td>{{$l->horario}}º</td>
      <td>{{$l->data}}</td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
