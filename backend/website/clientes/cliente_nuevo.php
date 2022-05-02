<?php

/* POO */

namespace smartCalendar;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once("conexion.php");

class ClienteNuevo extends Conexion {

   function CreateNewClient($objDatos)
   {
      $link1 = $this->Connect();
      $date = date('Y/m/d h:i:s', time());      
      $SQL = "INSERT INTO clientes 
      (
         nombre,
         primer_apellido,
         segundo_apellido,
         dni,
         fecha,
         telefono,
         movil_uno,
         movil_dos,
         movil_tutor,
         piso,
         codigo_postal,
         direccion,
         email,
         email_dos,
         poblacion
      )
      VALUES
      (
         '$objDatos->nombre',
         '$objDatos->primer_apellido',
         '$objDatos->segundo_apellido',
         '$objDatos->dni',
         '$date',
         '$objDatos->telefono',
         '$objDatos->movil_uno',
         '$objDatos->movil_dos',
         '$objDatos->movil_tutor',
         '$objDatos->piso',
         '$objDatos->codigo_postal',
         '$objDatos->direccion',
         '$objDatos->email',
         '$objDatos->email_dos',
         '$objDatos->poblacion'
      )
      ";

      $resp = mysqli_query($link1 , $SQL) or die(mysqli_error($link1));
      echo json_encode($resp);
   }


}

$objDatos = json_decode(file_get_contents("php://input"));
$clienteNuevo = new ClienteNuevo();
$clienteNuevo->CreateNewClient($objDatos);

 
/* $objDatos = json_decode(file_get_contents("php://input"));
$date = date('Y/m/d h:i:s', time());


$SQL = "INSERT INTO clientes 
  (
     nombre,
     primer_apellido,
     segundo_apellido,
     dni,
     fecha,
     telefono,
     movil_uno,
     movil_dos,
     movil_tutor,
     piso,
     codigo_postal,
     direccion,
     email,
     email_dos,
     poblacion
  )
  VALUES
  (
     '$objDatos->nombre',
     '$objDatos->primer_apellido',
     '$objDatos->segundo_apellido',
     '$objDatos->dni',
     '$date',
     '$objDatos->telefono',
     '$objDatos->movil_uno',
     '$objDatos->movil_dos',
     '$objDatos->movil_tutor',
     '$objDatos->piso',
     '$objDatos->codigo_postal',
     '$objDatos->direccion',
     '$objDatos->email',
     '$objDatos->email_dos',
     '$objDatos->poblacion'
  )
";

$resp = mysqli_query($link , $SQL) or die(mysqli_error($link));
echo json_encode($resp); 
?>