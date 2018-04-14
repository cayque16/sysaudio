@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Lista de Todos Usuários da Base de Dados</h3>

  <table class="table table-condensed">
    <th>ID</th>
    <th>Nome</th>
    <th>E-Mail</th>
    <th>Acesso</th>
    <th>Tipo</th>
    <th>Alterar</th>

    @foreach($user as $u)
    <tr>
      <td>{{$u->id}}</td>
      <td>{{$u->name}}</td>
      <td>{{$u->email}}</td>
      @if($u->acesso == 0)
        <td>0-Bloqueado</td>
      @else($u->acesso == 1)
        <td>1-Liberado</td>
      @endif
      @if($u->tipo == 0)
        <td>0-Usuário</td>
        <td>
          <form class="" action="/users/{{$u->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <input type="hidden" name="name" value="{{$u->name}}">
            <input type="hidden" name="email" value="{{$u->email}}">
            <input type="hidden" name="acesso" value="{{$u->acesso}}">
            <input type="hidden" name="tipo" value="1">

            <input type="submit" name="" value="Tornar Administrador" class="btn btn-primary">
          </form>
        </td>
      @else($u->tipo == 1)
        <td>1-Administrador</td>
        <td>
          <form class="" action="/users/{{$u->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <input type="hidden" name="name" value="{{$u->name}}">
            <input type="hidden" name="email" value="{{$u->email}}">
            <input type="hidden" name="acesso" value="{{$u->acesso}}">
            <input type="hidden" name="tipo" value="0">

            <input type="submit" name="" value="Tornar Usuário" class="btn btn-secondary">
          </form>
        </td>
      @endif
    </tr>
    @endforeach
  </table>
  <a href="/areaadmin" class="btn btn-primary">Voltar</a>
</div>
@endsection
