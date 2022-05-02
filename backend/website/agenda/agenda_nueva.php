<?php

/* POO */
namespace smartCalendar;
include_once ('cors.php');



include("conexion.php");

date_default_timezone_set ("Europe/Madrid"); 

class AgendaNueva extends Conexion{

  function CreateNewAgenda( $objDatos )
  { 
    
    $link1 = $this->Connect();

    $motivoIDS = "SELECT id_motivo FROM motivos WHERE nombre_motivo LIKE '%{$objDatos->motivoSelected}%' GROUP BY id_motivo ";
    $motivoIDS_result = mysqli_query($link1,$motivoIDS) or die(mysqli_error($link1));
    $motivo_id = mysqli_fetch_array($motivoIDS_result);
    $id_motivo = $motivo_id['id_motivo']; 
    
    $fecha = date("Y-m-d", strtotime($objDatos->fecha));
    $hora_inicio = date("H:i:s", strtotime($objDatos->hora_inicio));
    $hora_fin = date("H:i:s", strtotime($objDatos->hora_fin));
    $cliente = (isset($objDatos->cliente)) ? $objDatos->cliente : 1 ;
 
    $espId = "SELECT id_especialista FROM especialistas WHERE especialista LIKE '%{$objDatos->especialistaSelected}%'";
    $respEspId = mysqli_query($link1 , $espId) or die(mysqli_error($link1));
    $id_especialista_result = mysqli_fetch_array($respEspId);
    $id_especialista = intval($id_especialista_result['id_especialista']); 

    $SQL = "INSERT INTO agenda 
    (
    fecha,
    hora,
    hora_fin,
    cliente,
    notas,
    id_especialista,
    id_motivo,
    centro
    )
    VALUES
    (
    '$fecha',
    '$hora_inicio',
    '$hora_fin',
    '$cliente',
    '$objDatos->notas',
    '$id_especialista',
    '$id_motivo',
    '1'
  )
  "; 

  $nueva_agenda_insert = mysqli_query($link1 , $SQL) or die(mysqli_error($link1));
  echo $nueva_agenda_insert;

    /* $resp = mysqli_query($link1 , $SQL) or die(mysqli_error($link1)); */
   /*  header('Content-type:application/json;charset=utf-8'); */
    // echo json_encode($resp); 
  }

} 

$objDatos = json_decode(file_get_contents("php://input"));
$agendaNueva = new AgendaNueva();

$agendaNueva->CreateNewAgenda($objDatos); 
?>
