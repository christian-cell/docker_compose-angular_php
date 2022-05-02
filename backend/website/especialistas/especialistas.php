<?php

/* POO */


namespace smartCalendar;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

// require_once("conexion.php");
include('conexion.php');

class Especialistas extends Conexion {

  function GetEspecialistas()
  {
    $link1 = $this->Connect();

    $especialistas_query = "SELECT * FROM especialistas ";
    $especialistas_query_resp = mysqli_query($link1 , $especialistas_query)or die(mysqli_error($link1));

    $fila = 0 ;
    $arr = [] ;

    while ($especialista = mysqli_fetch_array($especialistas_query_resp)){
      
      $arr[$fila]['id_especialista'] =  $especialista['id_especialista'];
      $arr[$fila]['especialista'] =  $especialista['especialista'];
      $arr[$fila]['colegiado'] =  $especialista['colegiado'];
      $arr[$fila]['movil'] =  $especialista['movil'];
      $arr[$fila]['color'] =  $especialista['color'];
      $arr[$fila]['fecha'] =  $especialista['fecha'];

      $fila ++;
    }

    header('Content-type:application/json;charset=utf-8');
	  echo json_encode($arr); 
  }
}

$especialistas = new Especialistas();
$especialistas->GetEspecialistas()




































/* $SQL = "SELECT * FROM especialistas ";

$resp = mysqli_query($link , $SQL) or die(mysqli_error($link)) ;

$fila = 0;
$arr = [];
while ($dato = mysqli_fetch_array($resp)){
    

    $arr[$fila]['id_especialista'] =  $dato['id_especialista'];
    $arr[$fila]['especialista'] =  $dato['especialista'];
    $arr[$fila]['colegiado'] =  $dato['colegiado'];
    $arr[$fila]['movil'] =  $dato['movil'];
    $arr[$fila]['color'] =  $dato['color'];
    $arr[$fila]['fecha'] =  $dato['fecha'];
    
    $fila++;
};
	
	header('Content-type:application/json;charset=utf-8');
	echo json_encode($arr); */



?>