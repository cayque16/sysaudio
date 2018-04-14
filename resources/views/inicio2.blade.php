@extends('cabecalho')

@section('conteudo')
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<h3 style="text-align: center; font-family: inherit;">Agenda do Dia</h3>
<table style="text-align: center" width="513" height="340" border="1" align="center">
  <tr>
     <td colspan="6" style="text-align: center; font-size: 16px; font-style: normal; font-weight: bold; color: #000000;">
       @if($diaSemana == 0)
         Domingo - {{$dataAtual}}</td>
       @elseif($diaSemana == 1)
         Segunda - {{$dataAtual}}</td>
       @elseif($diaSemana == 2)
         Terça - {{$dataAtual}}</td>
       @elseif($diaSemana == 3)
         Quarta - {{$dataAtual}}</td>
       @elseif($diaSemana == 4)
         Quinta - {{$dataAtual}}</td>
       @elseif($diaSemana == 5)
         Sexta - {{$dataAtual}}</td>
       @elseif($diaSemana == 6)
         Sábado - {{$dataAtual}}</td>
       @endif

       <!-- MATUTINO INICIO -->

       <tr>
         <td colspan="6" style="text-align: center; font-size: 16px; font-style: normal; font-weight: bold; color: #000000;">
           Matutino
         </td>
       </tr>
   </tr>
   <tr>
    <td width="86" height="11" nowrap="nowrap" style="text-align: center; font-size: 13px; color: #000000;">Horário</td>
    <td width="86" height="11" nowrap="nowrap" style="text-align: center; font-size: 13px; color: #000000;">Tv 6º Ano</td>
    <td width="86" height="11" nowrap="nowrap" style="font-size: 13px; text-align: center; color: #000000;">Tv 7º Ano</td>
    <td width="86" height="11" nowrap="nowrap" style="font-size: 13px; text-align: center; color: #000000;">Tv 8º Ano</td>
    <td width="86" height="11" nowrap="nowrap" style="font-size: 13px; text-align: center; color: #000000;">Tv 9º Ano</td>
    <td width="86" height="11" nowrap="nowrap" style="font-size: 13px; text-align: center; color: #000000;">Áudio</td>
   </tr>
   @for($i=1;$i <= 6;$i++)
   <tr>
      <td style="text-align: center;font-style: normal;font-size: 15px; color: #000000;">{{$i}}º</td>

        <!-- BLOCO 1 INICIO -->
        @if(($locacoes->count() == 0) && (Auth::check()))
          @if(Auth::user()->acesso == 1)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
              <form class="" action="/locacaos" method="post">

                {{ csrf_field() }}

                <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                <input style="display:none;" type="text" name="idRecurso" value="1">
                <input style="display:none;" type="text" name="horario" value="{{$i}}">
                <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                <input style="display:none;" type="text" name="turno" value="Matutino">

                <input type="submit" value="Vazio" class="btn btn-link">
              </form>
            </td>
          @elseif(Auth::user()->acesso == 0)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
          @endif
        @elseif(($locacoes->count() != 0) && (Auth::check()))
          @foreach($locacoes as $l)
            @if(($l->horario == $i) && ($l->idRecurso == 1) && ($l->turno == "Matutino"))
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
              @break
            @elseif($l == $locacoes->last())
              @if(Auth::user()->acesso == 1)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                  <form class="" action="/locacaos" method="post">

                    {{ csrf_field() }}

                    <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                    <input style="display:none;" type="text" name="idRecurso" value="1">
                    <input style="display:none;" type="text" name="horario" value="{{$i}}">
                    <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                    <input style="display:none;" type="text" name="turno" value="Matutino">

                    <input type="submit" value="Vazio" class="btn btn-link">
                  </form>
                </td>
              @elseif(Auth::user()->acesso == 0)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
              @endif
            @endif
          @endforeach
        @elseif(($locacoes->count() == 0) && (Auth::guest()))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @elseif(($locacoes->count() != 0) && (Auth::guest()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 1) && ($l->turno == "Matutino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
          @endif
        @endforeach
        @endif
        <!-- BLOCO 1 FIM -->

        <!-- BLOCO 2 INICIO -->
        @if(($locacoes->count() == 0) && (Auth::check()))
          @if(Auth::user()->acesso == 1)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
              <form class="" action="/locacaos" method="post">

                {{ csrf_field() }}

                <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                <input style="display:none;" type="text" name="idRecurso" value="2">
                <input style="display:none;" type="text" name="horario" value="{{$i}}">
                <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                <input style="display:none;" type="text" name="turno" value="Matutino">

                <input type="submit" value="Vazio" class="btn btn-link">
              </form>
            </td>
          @elseif(Auth::user()->acesso == 0)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
          @endif
        @elseif(($locacoes->count() != 0) && (Auth::check()))
          @foreach($locacoes as $l)
            @if(($l->horario == $i) && ($l->idRecurso == 2) && ($l->turno == "Matutino"))
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
              @break
            @elseif($l == $locacoes->last())
              @if(Auth::user()->acesso == 1)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                  <form class="" action="/locacaos" method="post">

                    {{ csrf_field() }}

                    <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                    <input style="display:none;" type="text" name="idRecurso" value="2">
                    <input style="display:none;" type="text" name="horario" value="{{$i}}">
                    <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                    <input style="display:none;" type="text" name="turno" value="Matutino">

                    <input type="submit" value="Vazio" class="btn btn-link">
                  </form>
                </td>
              @elseif(Auth::user()->acesso == 0)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
              @endif
            @endif
          @endforeach
        @elseif(($locacoes->count() == 0) && (Auth::guest()))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @elseif(($locacoes->count() != 0) && (Auth::guest()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 2) && ($l->turno == "Matutino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
          @endif
        @endforeach
        @endif
        <!-- BLOCO 2 FIM -->

        <!-- BLOCO 3 INICIO -->
        @if(($locacoes->count() == 0) && (Auth::check()))
          @if(Auth::user()->acesso == 1)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
              <form class="" action="/locacaos" method="post">

                {{ csrf_field() }}

                <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                <input style="display:none;" type="text" name="idRecurso" value="3">
                <input style="display:none;" type="text" name="horario" value="{{$i}}">
                <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                <input style="display:none;" type="text" name="turno" value="Matutino">

                <input type="submit" value="Vazio" class="btn btn-link">
              </form>
            </td>
          @elseif(Auth::user()->acesso == 0)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
          @endif
        @elseif(($locacoes->count() != 0) && (Auth::check()))
          @foreach($locacoes as $l)
            @if(($l->horario == $i) && ($l->idRecurso == 3) && ($l->turno == "Matutino"))
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
              @break
            @elseif($l == $locacoes->last())
              @if(Auth::user()->acesso == 1)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                  <form class="" action="/locacaos" method="post">

                    {{ csrf_field() }}

                    <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                    <input style="display:none;" type="text" name="idRecurso" value="3">
                    <input style="display:none;" type="text" name="horario" value="{{$i}}">
                    <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                    <input style="display:none;" type="text" name="turno" value="Matutino">

                    <input type="submit" value="Vazio" class="btn btn-link">
                  </form>
                </td>
              @elseif(Auth::user()->acesso == 0)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
              @endif
            @endif
          @endforeach
        @elseif(($locacoes->count() == 0) && (Auth::guest()))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @elseif(($locacoes->count() != 0) && (Auth::guest()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 3) && ($l->turno == "Matutino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
          @endif
        @endforeach
        @endif
        <!-- BLOCO 3 FIM -->

        <!-- BLOCO 4 INICIO -->
        @if(($locacoes->count() == 0) && (Auth::check()))
          @if(Auth::user()->acesso == 1)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
              <form class="" action="/locacaos" method="post">

                {{ csrf_field() }}

                <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                <input style="display:none;" type="text" name="idRecurso" value="4">
                <input style="display:none;" type="text" name="horario" value="{{$i}}">
                <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                <input style="display:none;" type="text" name="turno" value="Matutino">

                <input type="submit" value="Vazio" class="btn btn-link">
              </form>
            </td>
          @elseif(Auth::user()->acesso == 0)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
          @endif
        @elseif(($locacoes->count() != 0) && (Auth::check()))
          @foreach($locacoes as $l)
            @if(($l->horario == $i) && ($l->idRecurso == 4) && ($l->turno == "Matutino"))
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
              @break
            @elseif($l == $locacoes->last())
              @if(Auth::user()->acesso == 1)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                  <form class="" action="/locacaos" method="post">

                    {{ csrf_field() }}

                    <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                    <input style="display:none;" type="text" name="idRecurso" value="4">
                    <input style="display:none;" type="text" name="horario" value="{{$i}}">
                    <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                    <input style="display:none;" type="text" name="turno" value="Matutino">

                    <input type="submit" value="Vazio" class="btn btn-link">
                  </form>
                </td>
              @elseif(Auth::user()->acesso == 0)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
              @endif
            @endif
          @endforeach
        @elseif(($locacoes->count() == 0) && (Auth::guest()))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @elseif(($locacoes->count() != 0) && (Auth::guest()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 4) && ($l->turno == "Matutino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
          @endif
        @endforeach
        @endif
        <!-- BLOCO 4 FIM -->

        <!-- BLOCO 5 INICIO -->
        @if(($locacoes->count() == 0) && (Auth::check()))
          @if(Auth::user()->acesso == 1)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
              <form class="" action="/locacaos" method="post">

                {{ csrf_field() }}

                <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                <input style="display:none;" type="text" name="idRecurso" value="5">
                <input style="display:none;" type="text" name="horario" value="{{$i}}">
                <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                <input style="display:none;" type="text" name="turno" value="Matutino">

                <input type="submit" value="Vazio" class="btn btn-link">
              </form>
            </td>
          @elseif(Auth::user()->acesso == 0)
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
          @endif
        @elseif(($locacoes->count() != 0) && (Auth::check()))
          @foreach($locacoes as $l)
            @if(($l->horario == $i) && ($l->idRecurso == 5) && ($l->turno == "Matutino"))
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
              @break
            @elseif($l == $locacoes->last())
              @if(Auth::user()->acesso == 1)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                  <form class="" action="/locacaos" method="post">

                    {{ csrf_field() }}

                    <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                    <input style="display:none;" type="text" name="idRecurso" value="5">
                    <input style="display:none;" type="text" name="horario" value="{{$i}}">
                    <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                    <input style="display:none;" type="text" name="turno" value="Matutino">

                    <input type="submit" value="Vazio" class="btn btn-link">
                  </form>
                </td>
              @elseif(Auth::user()->acesso == 0)
                <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
              @endif
            @endif
          @endforeach
        @elseif(($locacoes->count() == 0) && (Auth::guest()))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @elseif(($locacoes->count() != 0) && (Auth::guest()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 5) && ($l->turno == "Matutino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
          @endif
        @endforeach
        @endif
        <!-- BLOCO 5 FIM -->

   </tr>

   <!-- MATUTINO FIM -->

   @endfor

   <!-- VESPERTINHO INICIO -->

   <tr>
     <td colspan="6" style="text-align: center; font-size: 16px; font-style: normal; font-weight: bold; color: #000000;">
       Vespertino
     </td>
   </tr>
   @for($i=1;$i <= 6;$i++)
   <tr>
      <td style="text-align: center;font-style: normal;font-size: 15px; color: #000000;">{{$i}}º</td>

      <!-- BLOCO 1 INICIO -->
      @if(($locacoes->count() == 0) && (Auth::check()))
        @if(Auth::user()->acesso == 1)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
            <form class="" action="/locacaos" method="post">

              {{ csrf_field() }}

              <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
              <input style="display:none;" type="text" name="idRecurso" value="1">
              <input style="display:none;" type="text" name="horario" value="{{$i}}">
              <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
              <input style="display:none;" type="text" name="turno" value="Vespertino">

              <input type="submit" value="Vazio" class="btn btn-link">
            </form>
          </td>
        @elseif(Auth::user()->acesso == 0)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
        @endif
      @elseif(($locacoes->count() != 0) && (Auth::check()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 1) && ($l->turno == "Vespertino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            @if(Auth::user()->acesso == 1)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                <form class="" action="/locacaos" method="post">

                  {{ csrf_field() }}

                  <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                  <input style="display:none;" type="text" name="idRecurso" value="1">
                  <input style="display:none;" type="text" name="horario" value="{{$i}}">
                  <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                  <input style="display:none;" type="text" name="turno" value="Vespertino">

                  <input type="submit" value="Vazio" class="btn btn-link">
                </form>
              </td>
            @elseif(Auth::user()->acesso == 0)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
            @endif
          @endif
        @endforeach
      @elseif(($locacoes->count() == 0) && (Auth::guest()))
        <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
      @elseif(($locacoes->count() != 0) && (Auth::guest()))
      @foreach($locacoes as $l)
        @if(($l->horario == $i) && ($l->idRecurso == 1) && ($l->turno == "Vespertino"))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
          @break
        @elseif($l == $locacoes->last())
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @endif
      @endforeach
      @endif
      <!-- BLOCO 1 FIM -->

      <!-- BLOCO 2 INICIO -->
      @if(($locacoes->count() == 0) && (Auth::check()))
        @if(Auth::user()->acesso == 1)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
            <form class="" action="/locacaos" method="post">

              {{ csrf_field() }}

              <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
              <input style="display:none;" type="text" name="idRecurso" value="2">
              <input style="display:none;" type="text" name="horario" value="{{$i}}">
              <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
              <input style="display:none;" type="text" name="turno" value="Vespertino">

              <input type="submit" value="Vazio" class="btn btn-link">
            </form>
          </td>
        @elseif(Auth::user()->acesso == 0)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
        @endif
      @elseif(($locacoes->count() != 0) && (Auth::check()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 2) && ($l->turno == "Vespertino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            @if(Auth::user()->acesso == 1)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                <form class="" action="/locacaos" method="post">

                  {{ csrf_field() }}

                  <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                  <input style="display:none;" type="text" name="idRecurso" value="2">
                  <input style="display:none;" type="text" name="horario" value="{{$i}}">
                  <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                  <input style="display:none;" type="text" name="turno" value="Vespertino">

                  <input type="submit" value="Vazio" class="btn btn-link">
                </form>
              </td>
            @elseif(Auth::user()->acesso == 0)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
            @endif
          @endif
        @endforeach
      @elseif(($locacoes->count() == 0) && (Auth::guest()))
        <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
      @elseif(($locacoes->count() != 0) && (Auth::guest()))
      @foreach($locacoes as $l)
        @if(($l->horario == $i) && ($l->idRecurso == 2) && ($l->turno == "Vespertino"))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
          @break
        @elseif($l == $locacoes->last())
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @endif
      @endforeach
      @endif
      <!-- BLOCO 2 FIM -->

      <!-- BLOCO 3 INICIO -->
      @if(($locacoes->count() == 0) && (Auth::check()))
        @if(Auth::user()->acesso == 1)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
            <form class="" action="/locacaos" method="post">

              {{ csrf_field() }}

              <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
              <input style="display:none;" type="text" name="idRecurso" value="3">
              <input style="display:none;" type="text" name="horario" value="{{$i}}">
              <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
              <input style="display:none;" type="text" name="turno" value="Vespertino">

              <input type="submit" value="Vazio" class="btn btn-link">
            </form>
          </td>
        @elseif(Auth::user()->acesso == 0)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
        @endif
      @elseif(($locacoes->count() != 0) && (Auth::check()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 3) && ($l->turno == "Vespertino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            @if(Auth::user()->acesso == 1)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                <form class="" action="/locacaos" method="post">

                  {{ csrf_field() }}

                  <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                  <input style="display:none;" type="text" name="idRecurso" value="3">
                  <input style="display:none;" type="text" name="horario" value="{{$i}}">
                  <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                  <input style="display:none;" type="text" name="turno" value="Vespertino">

                  <input type="submit" value="Vazio" class="btn btn-link">
                </form>
              </td>
            @elseif(Auth::user()->acesso == 0)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
            @endif
          @endif
        @endforeach
      @elseif(($locacoes->count() == 0) && (Auth::guest()))
        <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
      @elseif(($locacoes->count() != 0) && (Auth::guest()))
      @foreach($locacoes as $l)
        @if(($l->horario == $i) && ($l->idRecurso == 3) && ($l->turno == "Vespertino"))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
          @break
        @elseif($l == $locacoes->last())
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @endif
      @endforeach
      @endif
      <!-- BLOCO 3 FIM -->

      <!-- BLOCO 4 INICIO -->
      @if(($locacoes->count() == 0) && (Auth::check()))
        @if(Auth::user()->acesso == 1)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
            <form class="" action="/locacaos" method="post">

              {{ csrf_field() }}

              <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
              <input style="display:none;" type="text" name="idRecurso" value="4">
              <input style="display:none;" type="text" name="horario" value="{{$i}}">
              <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
              <input style="display:none;" type="text" name="turno" value="Vespertino">

              <input type="submit" value="Vazio" class="btn btn-link">
            </form>
          </td>
        @elseif(Auth::user()->acesso == 0)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
        @endif
      @elseif(($locacoes->count() != 0) && (Auth::check()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 4) && ($l->turno == "Vespertino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            @if(Auth::user()->acesso == 1)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                <form class="" action="/locacaos" method="post">

                  {{ csrf_field() }}

                  <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                  <input style="display:none;" type="text" name="idRecurso" value="4">
                  <input style="display:none;" type="text" name="horario" value="{{$i}}">
                  <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                  <input style="display:none;" type="text" name="turno" value="Vespertino">

                  <input type="submit" value="Vazio" class="btn btn-link">
                </form>
              </td>
            @elseif(Auth::user()->acesso == 0)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
            @endif
          @endif
        @endforeach
      @elseif(($locacoes->count() == 0) && (Auth::guest()))
        <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
      @elseif(($locacoes->count() != 0) && (Auth::guest()))
      @foreach($locacoes as $l)
        @if(($l->horario == $i) && ($l->idRecurso == 4) && ($l->turno == "Vespertino"))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
          @break
        @elseif($l == $locacoes->last())
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @endif
      @endforeach
      @endif
      <!-- BLOCO 4 FIM -->

      <!-- BLOCO 5 INICIO -->
      @if(($locacoes->count() == 0) && (Auth::check()))
        @if(Auth::user()->acesso == 1)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
            <form class="" action="/locacaos" method="post">

              {{ csrf_field() }}

              <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
              <input style="display:none;" type="text" name="idRecurso" value="5">
              <input style="display:none;" type="text" name="horario" value="{{$i}}">
              <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
              <input style="display:none;" type="text" name="turno" value="Vespertino">

              <input type="submit" value="Vazio" class="btn btn-link">
            </form>
          </td>
        @elseif(Auth::user()->acesso == 0)
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
        @endif
      @elseif(($locacoes->count() != 0) && (Auth::check()))
        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 5) && ($l->turno == "Vespertino"))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            @if(Auth::user()->acesso == 1)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">
                <form class="" action="/locacaos" method="post">

                  {{ csrf_field() }}

                  <input style="display:none;" type="text" name="idUser" value="{{Auth::id()}}">
                  <input style="display:none;" type="text" name="idRecurso" value="5">
                  <input style="display:none;" type="text" name="horario" value="{{$i}}">
                  <input style="display:none;" type="text" name="data" value="{{date("y/m/d")}}">
                  <input style="display:none;" type="text" name="turno" value="Vespertino">

                  <input type="submit" value="Vazio" class="btn btn-link">
                </form>
              </td>
            @elseif(Auth::user()->acesso == 0)
              <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/mensagemAcesso">Vazio</a></span></td>
            @endif
          @endif
        @endforeach
      @elseif(($locacoes->count() == 0) && (Auth::guest()))
        <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
      @elseif(($locacoes->count() != 0) && (Auth::guest()))
      @foreach($locacoes as $l)
        @if(($l->horario == $i) && ($l->idRecurso == 5) && ($l->turno == "Vespertino"))
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}}</span></td>
          @break
        @elseif($l == $locacoes->last())
          <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="/login">Vazio</a></span></td>
        @endif
      @endforeach
      @endif
      <!-- BLOCO 5 FIM -->
   </tr>
   @endfor

   <!-- VESPERTINHO FIM -->

</table>
<p style="text-align: center">&nbsp;</p>
@if (Auth::check())
    <p style="text-align: center"> Para realizar uma marcação basta clicar em "Vazio" no horário desejado.</p>
@else
    <p style="text-align: center"> Para realizar uma marcação faça Login.</p>
@endif
<p style="text-align: center">Filtrar por dia:</p>
<form style="text-align: center" class="" action="/locacaos/pesquisa/data" method="get">
  <input type="date" name="data">
  <input type="submit" name="" value="Pesquisar">
</form>
<br><br><br>
</body>
</html>
@endsection
