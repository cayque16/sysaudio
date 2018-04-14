@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Excluir Recurso</h3>

  <div class="row">
    <div class="col-md-6">
      <h4>{{ $recursos->nome }}</h4>

      <form method="post" action="/recursos/{{ $recursos->id }}">

        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <br><input type="submit" value="Confirmar exclusão" class="btn btn-success">
        <a href="/areaadmin" class="btn btn-danger">Voltar ao menu principal</a>

      </form>

    </div>
  </div>
  <br><br>


</div>


@endsection
