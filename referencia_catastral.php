<?php
 require 'vendor/autoload.php';
 use eftec\bladeone\bladeone;

 $Views=__DIR__.'\Views';
 $Cache=__DIR__.'\Cache';

 $blade=new BladeOne($Views,$Cache);
    
 session_start();

$clientID = '807711344669-pbsgphq2k6pda7vsao2s7ksmf9n6i8iq.apps.googleusercontent.com';
$clientSecret ="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"; 
$redirectUri = 'http://localhost:8000';


$_SESSION['name']='';
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

$fichero="http://ovc.catastro.meh.es/ovcservweb/OVCSWLocalizacionRC/OVCCallejero.asmx?WSDL";
 
   $clienteSOAP= new SoapClient($fichero);
   
   $registro = $clienteSOAP->ObtenerProvincias()->any;
   $registro= new SimpleXMLElement($registro); 
   $registro = json_decode(json_encode($registro));
   $provincias=[];
    for($i=0;$i<48;$i++){
     
        $provincias[$i]['nombre']=$registro->provinciero->prov[$i]->np;
    }
    $_SESSION['provincias']=$provincias;
    if(isset($_GET['informacion'])){
       $texto='';
       $consulta=$_SESSION['consulta'];
       $mapa= $_SESSION['mapa'];
       $provincia= filter_input(INPUT_GET,'provincia');
       $municipio= filter_input(INPUT_GET,'municipio');
       $informacion =filter_input(INPUT_GET,'informacion');
       $registro = $clienteSOAP->Consulta_DNPRC($provincia,$municipio,$informacion)->any;
       $registro= new SimpleXMLElement($registro);
       $registro = json_decode(json_encode($registro));
       
       if(isset($registro->lerr)){
           $texto=$registro->lerr->err->des;
           $edificios=[];
       }else{
           $clase=$registro->bico->bi->idbi->cn;
           $localizacion=$registro->bico->bi->ldt;
           $uso=$registro->bico->bi->debi->luso;
           $superficie_construida=$registro->bico->bi->debi->sfc;
           $precio=$superficie_construida*1670;
       
           $anio=$registro->bico->bi->debi->ant;
           $precio=$precio.'€';
           $superficie_construida=$superficie_construida.'m2';
           $datos_referencia=[$informacion,$localizacion,$clase,$uso,$superficie_construida,$anio,$precio];
       }
       $edificios=[];
       echo $blade->run('catastro_consulta',['user'=>$_SESSION['name'],'provincias'=>$_SESSION['provincias'],'texto'=>$texto,'datos_referencia'=>$datos_referencia,'provincia'=>$consulta[0],'municipio'=>$consulta[1],'via'=>$consulta[2],'nombreVia'=>$consulta[3],'numero'=>$consulta[4],"mapa"=>$mapa]);
   }

    