<?php

/* POO */

namespace smartCalendar;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once("conexion.php");

class EspecialistaUpdate extends Conexion {


    function UpdateEspecialista($id_especialista , $color)
    {
        $link1 = $this->Connect();
        $SQL = "UPDATE especialistas SET `color`= '$color' WHERE id_especialista = '$id_especialista'";

        $resp = mysqli_query($link1 , $SQL) or die(mysqli_error($link1));


        echo json_encode($resp);
    }

}

$especialistaUpdate = new EspecialistaUpdate();
/* optionale arguments */
$especialistaUpdate->UpdateEspecialista($id_especialista = $_GET['id_especialista'] , $color = $_GET['color']);































/* $SQL = "UPDATE especialistas SET `color`= '".$_GET['color']."' WHERE id_especialista = '".$_GET['id_especialista']."'";

$resp = mysqli_query($link , $SQL) or die(mysqli_error($link));


echo json_encode($resp);  */

?>