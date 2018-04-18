@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Lista de Todas Locações</h3>
  <a href="/areaadmin" class="btn btn-danger">Voltar ao menu principal</a><br><br>

  <table class="table table-condensed">
    <th>ID</th>
    <th>Usuário</th>
    <th>Recurso</th>
    <th>Horário</th>
    <th>Data</th>
    <th>Editar</th>
    <th>Excluir</th>

    @foreach($locacaos as $l)
    <tr>
      <td>{{$l->id}}</td>
      <td>{{$l->user->name}}</td>
      <td>{{$l->recurso->nome}}</td>
      <td>{{$l->horario}}º</td>
      <td>{{$l->data}}</td>

      <td><a href="/recursos/{{ $l->id }}/edit"class="btn btn-info"><i class="fa fa-pencil"></i> Editar</a></td>
      <td><a href="/recursos/{{ $l->id }}/" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</a></td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
