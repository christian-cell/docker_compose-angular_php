<?php

/* POO */

namespace smartCalendar;    

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once("conexion.php");

class Motivos extends Conexion {
  function GetMotivos()
  {

    $link1 = $this->Connect();

    $SQL="SELECT * FROM motivos WHERE true";
    $resp = mysqli_query($link1 , $SQL)or die(mysqli_error($link1)) ;

    $fila = 0;
    $motivos = [];
    while ($dato = mysqli_fetch_array($resp)){

      $motivos[$fila]['id_motivo'] = $dato['id_motivo'];
      $motivos[$fila]['nombre_motivo'] = $dato['nombre_motivo'];
      $motivos[$fila]['descripcion_motivo'] = $dato['descripcion_motivo'];
      $motivos[$fila]['id_especialista'] = $dato['id_especialista'];
      $motivos[$fila]['color'] = $dato['color'];

      $fila++; 

    };

    header('Content-type:application/json;charset=utf-8');
    echo json_encode($motivos);

  }
}

$motivos = new Motivos();
$motivos->GetMotivos();



















/* NO POO */
/* $SQL="SELECT * FROM motivos WHERE true";
$resp = mysqli_query($link , $SQL) ;

$fila = 0;
$motivos = [];
while ($dato = mysqli_fetch_array($resp)){

  $motivos[$fila]['id_motivo'] = $dato['id_motivo'];
  $motivos[$fila]['nombre_motivo'] = $dato['nombre_motivo'];
  $motivos[$fila]['descripcion_motivo'] = $dato['descripcion_motivo'];
  $motivos[$fila]['id_especialista'] = $dato['id_especialista'];
 

  $fila++; 
  
};

header('Content-type:application/json;charset=utf-8');
echo json_encode($motivos); */ 

?>