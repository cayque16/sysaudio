@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Lista de Todas as Suas Locações</h3>

  <h4>Para excluir uma marcação, clique em Cancelar</h4>

  <table class="table table-condensed">
    <th>Usuário</th>
    <th>Recurso</th>
    <th>Turno</th>
    <th>Horário</th>
    <th>Data</th>
    <th>Cancelar</th>

    @foreach($marcacoes as $m)
    <tr>
      <td>{{$m->user->name}}</td>
      <td>{{$m->recurso->nome}}</td>
      <td>{{$m->turno}}</td>
      <td>{{$m->horario}}º</td>
      <td>{{$m->data}}</td>
      <td><a href="/locacaos/{{ $m->id }}/" class="btn btn-danger"><i class="fa fa-trash"></i> Cancelar</a></td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
