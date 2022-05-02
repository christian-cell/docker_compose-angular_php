<?php

/* POO */


namespace website\agenda;
use smartCalendar\Conexion;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

include("../conexion.php");

date_default_timezone_set ("Europe/Madrid");

class AgendaEdit extends Conexion {


  function EditAgenda ($objDatos)
  {
    // var_dump($objDatos);die();
    $link1 = $this->Connect();

    $fecha = date("Y-m-d", strtotime($objDatos->fecha));
    $especialista_id = intval($objDatos->espId);
    $hora_inicio = date("H:i:s", strtotime($objDatos->hora_inicio));
    $hora_fin = date("H:i:s", strtotime($objDatos->hora_fin));
    $notas = $objDatos->motivo;
    $id_agenda = intval($objDatos->id_agenda);
    $cliente = ( isset($objDatos->cliente) ) ? $objDatos->cliente : 0;


    $SQL = "UPDATE agenda SET 
      fecha = '$fecha',
      hora = '$hora_inicio',
      hora_fin = '$hora_fin',
      id_especialista = '$especialista_id', 
      cliente = '$cliente',
      notas = '$notas' 
    WHERE id_agenda = '$id_agenda'";

    $resp = mysqli_query($link1, $SQL) or die(mysqli_error($link1));
    echo json_encode($resp);

  }

}

$objDatos = json_decode(file_get_contents("php://input"));
$agendaEdit = new AgendaEdit();
$agendaEdit->EditAgenda($objDatos)

/* $objDatos = json_decode(file_get_contents("php://input"));
$fecha = date("Y-m-d", strtotime($objDatos->fecha));
$especialista_id = intval($objDatos->espId);
$hora_inicio = date("H:i:s", strtotime($objDatos->hora_inicio));
$hora_fin = date("H:i:s", strtotime($objDatos->hora_fin));
$notas = $objDatos->motivo;
$id_agenda = intval($objDatos->id_agenda);
$cliente = ( isset($objDatos->cliente) ) ? $objDatos->cliente : 0;


$SQL = "UPDATE agenda SET 
  fecha = '$fecha',
  hora = '$hora_inicio',
  hora_fin = '$hora_fin',
  id_especialista = '$especialista_id', 
  cliente = '$cliente',
  notas = '$notas' 
WHERE id_agenda = '$id_agenda'";

$resp = mysqli_query($link , $SQL) or die(mysqli_error($link));
echo json_encode($resp);  */

?>