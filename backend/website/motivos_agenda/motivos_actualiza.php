<?php

/* POO */


namespace smartCalendar;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

include("conexion.php");

/* var_dump($_GET['color']);
var_dump($_GET['id_motivo']); */

class MotivosUpdate extends Conexion {
    function UpdateMotivos ($id_motivo , $color)
    {
        // var_dump($id_motivo , $color);
        $link1 = $this->Connect();
        $SQL = " UPDATE motivos SET `color` = '$color' WHERE id_motivo = '$id_motivo' ";
        $resp = mysqli_query($link1,$SQL) or die(mysqli_error($link1));
        echo json_encode($resp);
    }
}

/* solving adding optional arguments */
$motivosUpdate = new MotivosUpdate();
$motivosUpdate->UpdateMotivos( $id_motivo = $_GET['id_motivo'] , $color = $_GET['color'] )

/* $SQL = " UPDATE motivos SET `color` = '".$_GET['color']."' WHERE id_motivo = '".$_GET['id_motivo']."' ";
$resp = mysqli_query($link,$SQL) or die(mysqli_error($link));
 */



?>