@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Inserir Novo Recurso:</h3>
  <form class="" action="/recursos" method="post">

    {{ csrf_field() }}

    <fieldset>
      <legend>Dados do recurso</legend>
      <label for="nome">Nome:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-modal-window"></i></span>
        <input type="text" class="form-control" name="nome" placeholder="Nome do recurso...">
      </div>
      <label for="descricao">Descrição:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
        <input type="text" class="form-control" name="descricao" placeholder="Descrição...">
      </div>
    </fieldset>
    <br>
    <input type="submit" value="Cadastrar" class="btn btn-success">
    <input type="reset" value="Limpar todos os campos" class="btn btn-info">
    <a href="/areaadmin" class="btn btn-danger">Voltar ao menu principal</a>
    <br><br>
  </form>
</div>

@endsection
