@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Inserir Nova Locação:</h3>
  <form class="" action="/locacaos" method="post">

    {{ csrf_field() }}

    <fieldset>
      <legend>Dados da locação</legend>
      <label for="idUser">Usuário:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-modal-window"></i></span>
        <select class="form-control" name="idUser">
          <option value="">Selecione...</option>
          @foreach($user as $u)
            <option value="{{$u->id}}">{{$u->name}}</option>
          @endforeach
        </select>
      </div>
      <label for="idRecurso">Recurso:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-modal-window"></i></span>
        <select class="form-control" name="idRecurso">
          <option value="">Selecione...</option>
          @foreach($recurso as $r)
            <option value="{{$r->id}}">{{$r->nome}}</option>
          @endforeach
        </select>
      </div>
      <label for="horario">Horário:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-modal-window"></i></span>
        <select class="form-control" name="horario">
          <option value="">Selecione...</option>
          <option value="1">1º</option>
          <option value="2">2º</option>
          <option value="3">3º</option>
          <option value="4">4º</option>
          <option value="5">5º</option>
          <option value="6">6º</option>
        </select>
      </div>
      <label for="data">Data:</label>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-modal-window"></i></span>
        <input type="date" name="data">
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
