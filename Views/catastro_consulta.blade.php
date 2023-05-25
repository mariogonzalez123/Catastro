
@extends('master')
@section('content')

<form action="index.php" method="POST">
    
    
   <h1>Consulta de datos catastrales</h1>
   <label for="Provincia">Provincia:</label>
    <select name="provincia">
        @foreach($provincias as $prov)
        @if($provincia == $prov['nombre'])
        <option value="{{$prov['nombre']}}" selected>{{$prov['nombre']}}</option>
        @else
        <option value="{{$prov['nombre']}}" >{{$prov['nombre']}}</option>
        @endif
        @endforeach
    </select><br>
   
    
    <label for="Municipio">Municipio:</label>
    <input id="municipio" name="municipio" type="text" placeholder="Introduce nombre" value="{{$municipio}}" required><br>
    
       <select name="via">
         @if($via=="CL")
          <option value="CL" selected>CALLE</option>
         @else
          <option value="CL">CALLE</option>
         @endif
         @if($via=="AV")
          <option value="AV" selected>AVENIDA</option>
         @else
          <option value="AV">AVENIDA</option>
         @endif
         @if($via=="PZ")
          <option value="PZ" selected>PLAZA</option>
         @else
          <option value="PZ">PLAZA</option>
         @endif
         @if($via=="PS")
          <option value="PS" selected>PASEO</option>
         @else
          <option value="PS">PASEO</option>
         @endif
         @if($via=="CR")
          <option value="CR" selected>CARRETERA, CARRERA</option>
         @else
          <option value="CR">CARRETERA, CARRERA</option>
         @endif
         @if($via=="AC")
          <option value="AC" selected>ACCESO</option>
         @else
          <option value="AC">ACCESO</option>
         @endif
         @if($via=="AG")
          <option value="AG" selected>AGREGADO</option>
         @else
          <option value="AG">AGREGADO</option>
         @endif
         @if($via=="AL")
          <option value="AL" selected>ALDEA, ALAMEDA</option>
         @else
          <option value="AL">ALDEA, ALAMEDA</option>
         @endif
         @if($via=="AN")
          <option value="AN"selected>ANDADOR</option>
        @else
          <option value="AN">ANDADOR</option>
        @endif
        @if($via=="AR")
          <option value="AR" selected>AREA, ARRABAL</option>
        @else
          <option value="AR">AREA, ARRABAL</option>
        @endif
        @if($via=="AY")
         <option value="AY" selected>ARROYO</option>
        @else
         <option value="AY">ARROYO</option>
        @endif
        @if($via=="AU")
         <option value="AU" selected>AUTOPISTA</option>
         @else
          <option value="AU">AUTOPISTA</option>
         @endif
         @if($via=="BJ")
          <option value="BJ" selected>BAJADA</option>
         @else
          <option value="BJ">BAJADA</option>
         @endif
         @if($via=="BL")
          <option value="BL" selected>BLOQUE</option>
         @else
          <option value="BL">BLOQUE</option>
         @endif
         @if($via=="BR")
          <option value="BR" selected>BARRANCO</option>
         @else
          <option value="BR">BARRANCO</option>
         @endif
         @if($via=="BQ")
          <option value="BQ" selected>BARRANQUIL</option>
         @else
          <option value="BQ">BARRANQUIL</option>
         @endif
         @if($via=="BO")
          <option value="BO" selected>BARRIO</option>
         @else
          <option value="BO">BARRIO</option>
         @endif
         @if($via=="BV")
          <option value="BV" selected>BULEVAR</option>
         @else
          <option value="BV">BULEVAR</option>
         @endif
         @if($via=="CY")
          <option value="CY" selected>CALEYA</option>
         @else
          <option value="CY">CALEYA</option>
         @endif
         @if($via=="CJ")
          <option value="CJ" selected>CALLEJA, CALLEJON</option>
         @else
          <option value="CJ">CALLEJA, CALLEJON</option>
         @endif
         @if($via=="CZ")
          <option value="CZ" selected>CALLIZO</option>
         @else
          <option value="CZ">CALLIZO</option>
         @endif          
         @if($via=="CM")
          <option value="CM" selected>CAMINO, CARMEN</option>
         @else
           <option value="CM">CAMINO, CARMEN</option>
         @endif
         @if($via=="CP")
           <option value="CP" selected>CAMPA, CAMPO</option>
         @else
           <option value="CP">CAMPA, CAMPO</option>
         @endif
         @if($via=="CA")
          <option value="CA" selected>CAÑADA</option>
         @else
          <option value="CA">CAÑADA</option>
         @endif
         @if($via=="CS")
          <option value="CS" selected>CASERIO</option>
         @else
          <option value="CS">CASERIO</option>
         @endif
         @if($via=="CH")
          <option value="CH" selected>CHALET</option>
         @else
          <option value="CH">CHALET</option>
         @endif
         @if($via=="CI")
          <option value="CI" selected>CINTURON</option>
          @else
           <option value="CI">CINTURON</option>
          @endif
          @if($via=="CG")
           <option value="CG" selected>COLEGIO, CIGARRAL</option>
          @else
           <option value="CG">COLEGIO, CIGARRAL</option>
          @endif
          @if($via=="CN")
           <option value="CN" selected>COLONIA</option>
          @else
           <option value="CN">COLONIA</option>
          @endif
          @if($via=="CO")
           <option value="CO" selected>CONCEJO, COLEGIO</option>
          @else
           <option value="CO">CONCEJO, COLEGIO</option>
          @endif
          @if($via=="CU")
           <option value="CU" selected>CONJUNTO</option>
          @else
           <option value="CU">CONJUNTO</option>
          @endif
          @if($via=="CT")
           <option value="CT" selected>CUESTA, COSTANILLA</option>
          @else
           <option value="CT">CUESTA, COSTANILLA</option>
          @endif
          @if($via=="DE")
           <option value="DE" selected>DETRAS</option>
          @else
           <option value="DE">DETRAS</option>
          @endif
          @if($via=="DP")
           <option value="DP" selected>DIPUTACION</option>
          @else
           <option value="DP">DIPUTACION</option>
          @endif
          @if($via=="DS")
           <option value="DS" selected>DISEMINADOS</option>
          @else
           <option value="DS">DISEMINADOS</option>
          @endif
          @if($via=="ED")
           <option value="ED" selected>EDIFICIOS</option>
          @else
           <option value="ED">EDIFICIOS</option>
          @endif
          @if($via=="EN")
           <option value="EN" selected>ENTRADA, ENSANCHE</option>
          @else
           <option value="EN">ENTRADA, ENSANCHE</option>
          @endif
          @if($via=="ES")
           <option value="ES" selected>ESCALINATA</option>
          @else
           <option value="ES">ESCALINATA</option>
          @endif
          @if($via=="ES")
           <option value="ES" selected>ESPALDA</option>
          @else
           <option value="ES">ESPALDA</option>
          @endif
          @if($via=="EX")
           <option value="EX" selected>EXPLANADA</option>
          @else
           <option value="EX">EXPLANADA</option>
          @endif
          @if($via=="EM")
           <option value="EM" selected>EXTRAMUROS</option>
          @else
           <option value="EM">EXTRAMUROS</option>
          @endif
          @if($via=="ER")
           <option value="ER" selected>EXTRARRADIO</option>
          @else
           <option value="ER">EXTRARRADIO</option>
          @endif
          @if($via=="FC")
           <option value="FC" selected>FERROCARRIL</option>
          @else
           <option value="FC">FERROCARRIL</option>
          @endif
          @if($via=="FN")
           <option value="FN" selected>FINCA</option>
          @else
           <option value="FN">FINCA</option>
          @endif
          @if($via=="GL")
           <option value="GL" selected>GLORIETA</option>
          @else
           <option value="GL">GLORIETA</option>
          @endif
          @if($via=="GV")
           <option value="GV" selected>GRAN VIA</option>
          @else
           <option value="GV">GRAN VIA</option>
          @endif
          @if($via=="GR")
            <option value="GR" selected>GRUPO</option>
          @else
           <option value="GR">GRUPO</option>
          @endif
          @if($via=="HT")
           <option value="HT" selected>HUERTA, HUERTO</option>
          @else
           <option value="HT">HUERTA, HUERTO</option>
          @endif
          @if($via=="JR")
           <option value="JR" selected>JARDINES</option>
          @else
           <option value="JR">JARDINES</option>
          @endif
          @if($via=="LD")
           <option value="LD" selected>LADO, LADERA</option>
          @else
           <option value="LD">LADO, LADERA</option>
          @endif
          @if($via=="LA")
           <option value="LA" selected>LAGO</option>
          @else
           <option value="LA">LAGO</option>
          @endif
          @if($via=="LG")
           <option value="LG" selected>LUGAR</option>
          @else
           <option value="LG">LUGAR</option>
          @endif
          @if($via=="MA")
           <option value="MA" selected>MALECON</option>
          @else
           <option value="MA">MALECON</option>
          @endif
          @if($via=="MZ")
           <option value="MZ" selected>MANZANA</option>
           @else
           <option value="MZ">MANZANA</option>
          @endif
          @if($via=="MS")
           <option value="MS" selected>MASIAS</option>
          @else
           <option value="MS">MASIAS</option>
          @endif
          @if($via=="MC")
           <option value="MC" selected>MERCADO</option>
          @else
           <option value="MC">MERCADO</option>
          @endif
          @if($via=="MT")
           <option value="MT" selected>MONTE</option>
          @else
           <option value="MT">MONTE</option>
          @endif
          @if($via=="ML")
           <option value="ML" selected>MUELLE</option>
          @else
           <option value="ML">MUELLE</option>
          @endif
          @if($via=="MN")
           <option value="MN" selected>MUNICIPIO</option>
          @else
           <option value="MN">MUNICIPIO</option>
          @endif
          @if($via=="PM")
           <option value="PM" selected>PARAMO</option>
          @else
           <option value="PM">PARAMO</option>
          @endif
          @if($via=="PQ")
           <option value="PQ" selected>PARROQUIA, PARQUE</option>
          @else
           <option value="PQ">PARROQUIA, PARQUE</option>
          @endif
          @if($via=="PI")
           <option value="PI" selected>PARTICULAR</option>
          @else
           <option value="PI">PARTICULAR</option>
          @endif
          @if($via=="PD")
           <option value="PD" selected>PARTIDA</option>
          @else
           <option value="PD">PARTIDA</option>
          @endif
          @if($via=="CN")
           <option value="PU" selected>PASADIZO</option>
          @else
           <option value="PU">PASADIZO</option>
          @endif
          @if($via=="CN")
           <option value="PJ" selected>PASAJE, PASADIZO</option>
          @else
           <option value="PJ">PASAJE, PASADIZO</option>
          @endif
          @if($via=="PC")
           <option value="PC" selected>PLACETA</option>
          @else
           <option value="PC">PLACETA</option>
          @endif
          @if($via=="PB")
           <option value="PB" selected>POBLADO</option>
          @else
           <option value="PB">POBLADO</option>
          @endif
          @if($via=="PL")
           <option value="PL" selected>POLIGONO</option>
          @else
           <option value="PL">POLIGONO</option>
          @endif
          @if($via=="PR")
           <option value="PR" selected>PROLONGACION, CONTINUAC.</option>
          @else
           <option value="PR">PROLONGACION, CONTINUAC.</option>
          @endif
          @if($via=="PT")
           <option value="PT" selected>PUENTE</option>
          @else
           <option value="PT">PUENTE</option>
          @endif
          @if($via=="QT")
           <option value="QT" selected>QUINTA</option>
          @else
           <option value="QT">QUINTA</option>
          @endif
          @if($via=="RA")
           <option value="RA" selected>RACONADA</option>
          @else
           <option value="RA">RACONADA</option>
          @endif
          @if($via=="RM")
           <option value="RM" selected>RAMAL</option>
          @else
           <option value="RM">RAMAL</option>
          @endif
          @if($via=="RB")
           <option value="RB" selected>RAMBLA</option>
          @else
           <option value="RB">RAMBLA</option>
          @endif
          @if($via=="RC")
           <option value="RC" selected>RINCON, RINCONA</option>
          @else
           <option value="RC">RINCON, RINCONA</option>
          @endif
          @if($via=="RD")
           <option value="RD" selected>RONDA</option>
          @else
           <option value="RD">RONDA</option>
          @endif
          @if($via=="RP")
           <option value="RP" selected>RAMPA</option>
          @else
           <option value="RP">RAMPA</option>
          @endif
          @if($via=="RR")
            <option value="RR" selected>RIERA</option>
          @else
           <option value="RR">RIERA</option>
          @endif
          @if($via=="RU")
           <option value="RU" selected>RUA</option>
          @else
           <option value="RU">RUA</option>
          @endif
          @if($via=="SA")
           <option value="SA" selected>SALIDA</option>
          @else
           <option value="SA">SALIDA</option>
          @endif
          @if($via=="SN")
           <option value="SN" selected>SALON</option>
          @else
           <option value="SN">SALON</option>
          @endif
          @if($via=="SC")
           <option value="SC" selected>SECTOR</option>
          @else
           <option value="SC">SECTOR</option>
          @endif
          @if($via=="SD")
           <option value="SD" selected>SENDA</option>
          @else
           <option value="SD">SENDA</option>
          @endif
          @if($via=="SL")
           <option value="SL" selected>SOLAR</option>
          @else
           <option value="SL">SOLAR</option>
          @endif
          @if($via=="SU")
           <option value="SU" selected>SUBIDA</option>
          @else
           <option value="SU">SUBIDA</option>
          @endif
          @if($via=="TN")
           <option value="TN" selected>TERRENOS</option>
          @else
           <option value="TN">TERRENOS</option>
          @endif
          @if($via=="TO")
           <option value="TO" selected>TORRENTE</option>
          @else
           <option value="TO">TORRENTE</option>
          @endif
          @if($via=="TR")
           <option value="TR" selected>TRAVESIA</option>
          @else
           <option value="TR">TRAVESIA</option>
          @endif
          @if($via=="UR")
           <option value="UR" selected>URBANIZACION</option>
          @else
           <option value="UR">URBANIZACION</option>
          @endif
          @if($via=="VA")
           <option value="VA" selected>VALLE</option>
          @else
           <option value="VA">VALLE</option>
          @endif
          @if($via=="VR")
          <option value="VR" selected>VEREDA</option>
          @else
           <option value="VR">VEREDA</option>
          @endif
          @if($via=="VI")
           <option value="VI" selected>VIA</option>
          @else
           <option value="VI">VIA</option>
          @endif
          @if($via=="VD")
           <option value="VD" selected>VIADUCTO</option>
          @else
           <option value="VD">VIADUCTO</option>
          @endif
          @if($via=="VL")
           <option value="VL" selected>VIAL</option>
          @else
           <option value="VL">VIAL</option>
           @endif
       </select><br>
     
       <label for="nombre_via">Nombre via:</label>
       <input  name="nombre_via" type="text" placeholder="" value="{{$nombreVia}}" required><br>
   
  
    
   <label for="Número">Numero:</label>
   <input id="numero" name="numero" type="nombre" placeholder="" value="{{$numero}}" required><br>
    
    
    
  <input class="submit" type="submit" value="consulta" name="consulta">
</form>
<br><br>

<div>
 <iframe width="350" height="350" src="{{$mapa}}"></iframe>
</div>



@if(!empty($edificios))
<table width="100%" cellspacing="0" cellpadding="1" border="1">
    <tr>
    <th>VÍA</th>
    <th>NÚMERO</th>
    <th>ESCALERA</th>
    <th>PLANTA</th>
    <th>PUERTA</th>
    <th>REFERENCIA CATASTRAL</th></tr>
    @foreach($edificios as $edificio)
    <tr>
     <th>{{$edificio[0]}}</th>
     <th>{{$edificio[1]}}</th>
     <th>{{$edificio[2]}}</th>
     <th>{{$edificio[3]}}</th>
     <th>{{$edificio[4]}}</th>
     <th><form method="post" action=""><a href="referencia_catastral.php?informacion={{$edificio[5]}}&provincia={{$edificio[6]}}&municipio={{$edificio[7]}}"/>{{$edificio[5]}}</th></tr>
    @endforeach                                                                                                         
</table>
@endif

@if(!empty($datos_referencia))
<table border="1px solid black">
    <tr><th colspan="2">Datos Descriptivos de la propiedad</th></tr>
    <tr><th>Referencia Catastral</th><th>{{$datos_referencia[0]}}</th></tr>
    <tr><th>Localizacion</th><th>{{$datos_referencia[1]}}</th></tr>
    <tr><th>Clase</th><th>{{$datos_referencia[2]}}</th></tr>
    <tr><th>Uso</th><th>{{$datos_referencia[3]}}</th></tr>
    <tr><th>Superficie Construida</th><th>{{$datos_referencia[4]}}</th></tr>
    <tr><th>Año de Construcción</th><th>{{$datos_referencia[5]}}</th></tr>
    <tr><th>Precio</th><th>{{$datos_referencia[6]}}</th></tr>
</table>
@endif
@if(!empty($texto))
<table   border="1px solid black">
 <tr><th colspan="2">Mensaje de error</th></tr>
 <tr><td>ERROR</td><td>{{$texto}}</td></tr>
    
</table>
@endif





@endsection