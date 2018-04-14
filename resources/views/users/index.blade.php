@extends('cabecalho')

@section('conteudo')

<div class="container">
  <h3>Lista de Todos Usuários da Base de Dados</h3>

  <table class="table table-condensed">
    <th>ID</th>
    <th>Nome</th>
    <th>E-Mail</th>
    <th>Tipo</th>
    <th>Acesso</th>

    @foreach($user as $u)
    <tr>
      <td>{{$u->id}}</td>
      <td>{{$u->name}}</td>
      <td>{{$u->email}}</td>
      @if($u->tipo == 0)
        <td>0-Usuário</td>
      @else($u->tipo == 1)
        <td>1-Administrador</td>
      @endif
      @if($u->acesso == 0)
        <td>0-Bloqueado</td>
      @else($u->acesso == 1)
        <td>1-Liberado</td>
      @endif
    </tr>
    @endforeach
  </table>
  <a href="/areaadmin" class="btn btn-primary">Voltar</a>
</div>
@endsection
