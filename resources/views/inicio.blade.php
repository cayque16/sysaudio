@extends('cabecalho')

@section('conteudo')
<html>
<head>
<meta charset="utf-8">
</head>

<body>
<h3 style="text-align: center; font-family: inherit;">Agenda do </h3>
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
   </tr>
   <tr>
    <td width="86" height="11" nowrap="nowrap" style="text-align: center; font-size: 13px; color: #000000;">Horário</td>
    <td width="86" height="11" nowrap="nowrap" style="text-align: center; font-size: 13px; color: #000000;">Tv 6º Ano</td>
    <td width="86" height="11" nowrap="nowrap" style="font-size: 13px; text-align: center; color: #000000;">Tv 7º Ano</td>
    <td width="86" height="11" nowrap="nowrap" style="font-size: 13px; text-align: center; color: #000000;">Tv 8º Ano</td>
    <td width="86" height="11" nowrap="nowrap" style="font-size: 13px; text-align: center; color: #000000;">Tv 9º Ano</td>
    <td width="86" height="11" nowrap="nowrap" style="font-size: 13px; text-align: center; color: #000000;">Áudio</td>
   </tr>
   @for($i=1;$i <= 5;$i++)
   <tr>
      <td style="text-align: center;font-style: normal;font-size: 15px; color: #000000;">{{$i}}º</td>

        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 1))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}} {{$l->turma}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="google.com">Vazio</a></span></td>d bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="google.com">Vazio</a></span></td>
          @endif
        @endforeach

        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 2))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}} {{$l->turma}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="google.com">Vazio</a></span></td>
          @endif
        @endforeach

        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 3))
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}} {{$l->turma}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            <td bgcolor="#D9D9D9"><span style="text-align: center;font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="google.com">Vazio</a></span></td>
          @endif
        @endforeach

        @foreach($locacoes as $l)
          @if(($l->horario == $i) && ($l->idRecurso == 4))
            <td bgcolor="#D9D9D9"><span style="font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}} {{$l->turma}}</span></td>
            @break
          @elseif($l == $locacoes->last())
            <td bgcolor="#D9D9D9"><span style="font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="google.com">Vazio</a></span></td>
          @endif
        @endforeach

      @foreach($locacoes as $l)
        @if(($l->horario == $i) && ($l->idRecurso == 5))
          <td bgcolor="#D9D9D9"><span style="font-style: normal; font-size: 13px;color: #FF0A0A;">{{$l->user->name}} {{$l->turma}}</span></td>
          @break
        @elseif($l == $locacoes->last())
          <td bgcolor="#D9D9D9"><span style="font-style: normal; font-size: 13px;color: #FF0A0A;"><a href="google.com">Vazio</a></span></td>
        @endif
      @endforeach

   </tr>
   @endfor
</table>
<p style="text-align: center">&nbsp;</p>
<p style="text-align: center"> Para realizar uma marcação basta clicar em "Vazio" no horário desejado.</p>
<p style="text-align: center">Filtrar por dia:
  <input type="date" name="date" id="date">
  <input type="button" name="" value="Pesquisar">
</p>
</body>
</html>
@endsection
