@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Excluir Locação</h3>

  <div class="row">
    <div class="col-md-6">
      <table class="table table-condensed">
        <th>Usuário</th>
        <th>Recurso</th>
        <th>Turno</th>
        <th>Horário</th>
        <th>Data</th>
        <tr>
          <td>{{$locacaos->user->name}}</td>
          <td>{{$locacaos->recurso->nome}}</td>
          <td>{{$locacaos->turno}}</td>
          <td>{{$locacaos->horario}}º</td>
          <td>{{$locacaos->data}}</td>
        </tr>
      </table>

      <form method="post" action="/locacaos/{{ $locacaos->id }}">

        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <br><input type="submit" value="Confirmar exclusão" class="btn btn-success">
        <a href="/locacaos/marcacoes" class="btn btn-danger">Cancelar exclusão</a>

      </form>

    </div>
  </div>
  <br><br>


</div>


@endsection
