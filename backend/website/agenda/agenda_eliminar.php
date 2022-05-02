<?php

/* POO */

namespace smartCalendar; 
header('Access-Control-Allow-Origin: http://localhost:4200'); 

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE'); 

require_once("conexion.php");

class AgendaEliminar extends Conexion {

    function EliminarAgenda ()
    {
        $link1 = $this->Connect();

        $SQL = "DELETE FROM agenda WHERE id_agenda = " .$_GET["agenda_id"];


        $resp = mysqli_query($link1 , $SQL)or die(mysqli_error($link1)) ;



        header('Content-type:application/json;charset=utf-8');
        echo json_encode($resp);
    }

}

$agendaEliminar = new AgendaEliminar();
$agendaEliminar->EliminarAgenda();


/* $SQL = "DELETE FROM agenda WHERE id_agenda = " .$_GET["agenda_id"];


$resp = mysqli_query($link , $SQL) ;



header('Content-type:application/json;charset=utf-8');
echo json_encode($resp); */

?>