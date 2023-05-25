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

$header = "INFORMACION CATASTRAL";
$email = "";
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
if(empty($_POST)){
if (isset($_GET['code']) ) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
   
    if(isset($token['error'])){
        echo $blade->run('inicio',['url'=>$client->createAuthUrl()]);
    }else{
    $client->setAccessToken($token['access_token']);
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
    $_SESSION['name']=$name;
    echo $blade->run('catastro',['user'=>$_SESSION['name'],'provincias'=>$provincias]);
    }

  } else {
    echo $blade->run('inicio',['url'=>$client->createAuthUrl()]);
    
  }
}
   if(isset($_POST['consulta'])){
       $edificios=[];
       $texto='';
       $provincia= filter_input(INPUT_POST,'provincia');
       $municipio= filter_input(INPUT_POST,'municipio');
       $via= filter_input(INPUT_POST,'via');
       $nombreVia= filter_input(INPUT_POST,'nombre_via');
       $numero=filter_input(INPUT_POST,'numero');
       $consulta=[$provincia,$municipio,$via,$nombreVia,$numero];
       $_SESSION['consulta']=$consulta;
       $registro = $clienteSOAP->Consulta_DNPLOC($provincia,$municipio,$via,$nombreVia,$numero)->any;
       $registro= new SimpleXMLElement($registro);
       $registro = json_decode(json_encode($registro));
       
       if(isset($registro->lerr)){
           $texto=$registro->lerr->err->des;
           $viviendas=[];
       }else{
           if($registro->control->cudnp==1){
           $planta=$registro->bico->bi->dt->locs->lous->lourb->loint->pt;
           $puerta=$registro->bico->bi->dt->locs->lous->lourb->loint->pu;
           $escalera=$registro->bico->bi->dt->locs->lous->lourb->loint->es;
           $catastro=$registro->bico->bi->idbi->rc;
           $referenciaCatastro=$catastro->pc1.$catastro->pc2.$catastro->car.$catastro->cc1.$catastro->cc2;
           $edificio=[$nombreVia,$numero,$escalera,$planta,$puerta,$referenciaCatastro,$provincia,$municipio];
           $edificios[]=$edificio;
               
           }else{
            $finca=$registro->lrcdnp;
            $viviendas=[];
            $n=$registro->control->cudnp;
            for($i=0;$i<$n;$i++){
               $registro2= $finca->rcdnp[$i];
               $referenciaCatastro='';
               $planta=$registro2->dt->locs->lous->lourb->loint->pt;
               $puerta=$registro2->dt->locs->lous->lourb->loint->pu;            
               $escalera=$registro2->dt->locs->lous->lourb->loint->es;           
               $referenciaCatastro=$registro2->rc->pc1.$registro2->rc->pc2.$registro2->rc->car.$registro2->rc->cc1.$registro2->rc->cc2;
               $edificio=[$nombreVia,$numero,$escalera,$planta,$puerta,$referenciaCatastro,$provincia,$municipio];
                $edificios[]=$edificio;
               }
           }
       }
       $mapa="https://www.google.com/maps?width=400&height=400&hl=es&q=".$provincia.",".$municipio.",".$via." ".$nombreVia.",".$numero."&t=k&z=20&ie=UTF8&iwloc=B&output=embed";
       $_SESSION['mapa']=$mapa;
       echo $blade->run('catastro_consulta',['user'=>$_SESSION['name'],'texto'=>$texto,'edificios'=>$edificios,'provincia'=>$provincia,'provincias'=>$_SESSION['provincias'],'provincias'=>$_SESSION['provincias'],'municipio'=>$municipio,'via'=>$via,'nombreVia'=>$nombreVia,'numero'=>$numero,"mapa"=>$mapa]);
    
   }
   
  
   

