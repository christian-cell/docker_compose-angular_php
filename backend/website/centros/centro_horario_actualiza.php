<?php

namespace website\centros\centroHorario;
use website\conexion\Conexion;
require_once('../cors.php');
require_once("../conexion.php");

class CentroHorarioActualiza {

    private $SQL_horario_actaliza;
  
    /* 
    * @params le pasamos el cuerpo del post
    */

    public function updateHorario($horario)
    {
        $link = Conexion::Connect();
        // var_dump($horario);
        
        $this->SQL_horario_actaliza = "
          UPDATE `centro_horarios` SET
          `lunes_apertura_manana` = '".$horario->lunes_apertura_manana."',
          `lunes_cierre_manana` = '".$horario->lunes_cierre_manana."',
          `lunes_apertura_tarde` = '".$horario->lunes_apertura_tarde."',
          `lunes_cierre_tarde` = '".$horario->lunes_cierre_tarde."',
          `martes_apertura_manana` = '".$horario->martes_apertura_manana."',
          `martes_cierre_manana` = '".$horario->martes_cierre_manana."',
          `martes_apertura_tarde` = '".$horario->martes_apertura_tarde."',
          `martes_cierre_tarde` = '".$horario->martes_cierre_tarde."',
          `miercoles_apertura_manana` = '".$horario->miercoles_apertura_manana."',
          `miercoles_cierre_manana` = '".$horario->miercoles_cierre_manana."',
          `miercoles_apertura_tarde` = '".$horario->miercoles_apertura_tarde."',
          `miercoles_cierre_tarde` = '".$horario->miercoles_cierre_tarde."',
          `jueves_apertura_manana` = '".$horario->jueves_apertura_manana."',
          `jueves_cierre_manana` = '".$horario->jueves_cierre_manana."',
          `jueves_apertura_tarde` = '".$horario->jueves_apertura_tarde."',
          `jueves_cierre_tarde` = '".$horario->jueves_cierre_tarde."',
          `viernes_apertura_manana` = '".$horario->viernes_apertura_manana."',
          `viernes_cierre_manana` = '".$horario->viernes_cierre_manana."',
          `viernes_apertura_tarde` = '".$horario->viernes_apertura_tarde."',
          `viernes_cierre_tarde` = '".$horario->viernes_cierre_tarde."',
          `sabado_apertura_manana` = '".$horario->sabado_apertura_manana."',
          `sabado_cierre_manana` = '".$horario->sabado_cierre_manana."',
          `sabado_apertura_tarde` = '".$horario->sabado_apertura_tarde."',
          `sabado_cierre_tarde` = '".$horario->sabado_cierre_tarde."',
          `domingo_apertura_manana` = '".$horario->domingo_apertura_manana."',
          `domingo_cierre_manana` = '".$horario->domingo_cierre_manana."',
          `domingo_apertura_tarde` = '".$horario->domingo_apertura_tarde."',
          `domingo_cierre_tarde` = '".$horario->domingo_cierre_tarde."'

          WHERE id_centro = '".$horario->id_centro."'
        ";

        $SQL_resp = mysqli_query($link , $this->SQL_horario_actaliza)or die(mysqli_error($link));
        echo $SQL_resp;
    } 
  

}

$objDatos = json_decode(file_get_contents("php://input"));
$centro_horario_actualiza = new CentroHorarioActualiza();
$centro_horario_actualiza->updateHorario($objDatos); 

?>