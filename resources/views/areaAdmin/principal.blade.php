@extends('cabecalho')

@section('conteudo')
  @if(Auth::user()->tipo == 1)
    <div id="navbar">
      <div class="container" >
        <ul class="nav nav-pills nav-tabs" id="teste">
          <li class="active"><a data-toggle="pill" href="#home">Início</a></li>
          <li><a data-toggle="pill" href="#menu1">Usuários</a></li>
          <li><a data-toggle="pill" href="#menu2">Recursos</a></li>
          <li><a data-toggle="pill" href="#menu3">Locações</a></li>
          <li><a href="/">Home</a></li>
        </ul>
      </div>
    </div>

    <div>
      <div class="container">
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <h3>Início</h3>
            <h4><p>Área administrativa</h4>
            <br>
            Todas as tarefas que são permitidas pelo sistema foram divididas em uma das categorias
            acima. </p>
          </div>

          <div id="menu1" class="tab-pane fade">
            <h3>Usuários</h3>

            <div class="col-md-2" align="center" id="selecionado">
              <a href="/users"><img src="https://png.icons8.com/color/96/000000/group.png"></a>
              <h4>Listar todos usuários</h4>
              <p>Visualize todos os usuários cadastrados</p>
            </div>

            <div class="col-md-2" align="center" id="selecionado">
              <a href="/users/edita/tipo"><img src="https://png.icons8.com/color/96/000000/administrator-male.png"></a>
              <h4>Alterar o tipo de um usuário</h4>
              <p>Torne um outro usuário administrador<br>alterando o seu código de tipo.</p>
            </div>

            <div class="col-md-2" align="center" id="selecionado">
              <a href="/users/edita/acesso"><img src="https://png.icons8.com/color/96/000000/add-user-group-man-man.png"></a>
              <h4>Liberar acesso de usuário</h4>
              <p>Libere o acesso de um usuário qualquer<br> alterando o seu código de acesso.</p>
            </div>
          </div>

          <div id="menu2" class="tab-pane fade">
            <h3>Recursos</h3>

            <div class="col-md-3" align="center" id="selecionado">
              <a href="/recursos/create"><img src="https://png.icons8.com/color/96/000000/workstation.png"></a>
              <h4>Adicionar novo recurso</h4>
              <p>Adicione informações<br>de um novo recurso na base de dados.</p>
            </div>

            <div class="col-md-3" align="center" id="selecionado">
              <a href="/recursos"><img src="https://png.icons8.com/color/96/000000/under-computer.png"></a>
              <h4>Editar/Excluir recurso</h4>
              <p>Edite ou exclua as informações<br>de um recurso cadastrado.</p>
            </div>
          </div>

          <div id="menu3" class="tab-pane fade">
            <h3>Locações</h3>

            <div class="col-md-3" align="center" id="selecionado">
              <a href="/locacaos/create"><img src="https://png.icons8.com/color/96/000000/sell.png"></a>
              <h4>Inserir nova locação</h4>
              <p>Adicione uma nova<br>locação para um determinado usuário.</p>
            </div>

            <div class="col-md-3" align="center" id="selecionado">
              <a href="/locacaos"><img src="https://png.icons8.com/color/96/000000/shop.png"></a>
              <h4>Editar/Excluir locação</h4>
              <p>Edite ou exclua as informações<br>de uma locação cadastrada.</p>
            </div>
          </div>

        </div>

      </div>

    </div>
  @elseif(Auth::user() -> tipo == 0)
    <center><h1>Acesso restrito!!!</h1></center>
  @endif
@endsection
