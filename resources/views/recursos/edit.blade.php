@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Editar Recurso</h3>
  <form class="" action="/recursos/{{ $recursos->id }}" method="post">

    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <fieldset>
      <legend>Dados do recurso</legend>
      <label for="nome">Nome:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-modal-window"></i></span>
        <input type="text" class="form-control" name="nome" value="{{ $recursos->nome}}">
      </div>
      <label for="descricao">Descrição:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
        <input type="text" class="form-control" name="descricao" value="{{ $recursos->descricao}}">
      </div>
    </fieldset>
    <br>
    <input type="submit" value="Confirmar" class="btn btn-success">
    <input type="reset" value="Limpar todos os campos" class="btn btn-danger">
    <a href="/areaadmin" class="btn btn-danger">Voltar ao menu principal</a><br><br>
  </form>
</div>

@endsection
