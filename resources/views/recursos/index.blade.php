@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Todos Recursos da Base de Dados</h3><br>
  <a href="/areaadmin" class="btn btn-danger">Voltar ao menu principal</a><br><br>

  <table class="table table-condensed">
    <th>ID</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Editar</th>
    <th>Excluir</th>

    @foreach($recursos as $r)
    <tr>
      <td>{{ $r->id }}</td>
      <td>{{ $r->nome }}</td>
      <td>{{ $r->descricao }}</td>

      <td><a href="/recursos/{{ $r->id }}/edit"class="btn btn-info"><i class="fa fa-pencil"></i> Editar</a></td>
      <td><a href="/recursos/{{ $r->id }}/" class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</a></td>
    </tr>
    @endforeach
  </table>

</div>
@endsection
