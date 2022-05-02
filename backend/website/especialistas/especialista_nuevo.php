<?php

namespace website\especialista\EspecialistaNuevo;
use website\conexion\Conexion;
require_once('../cors.php');
require_once("../conexion.php");

class EspecialistaNuevo {

    private $SQL_especialista_nuevo;
  
    /* 
    * @params le pasamos el cuerpo del post
    */

    public function CreateEspecialista($especialista)
    {
        $link = Conexion::Connect();

        $date = date('Y/m/d h:i:s', time());

        $this->SQL_especialista_nuevo = "
            INSERT INTO `especialistas`(
                `especialista`,
                `e_mail`,
                `movil`,
                `colegiado`,
                `color`,
                `fecha`
            )VALUES(
                '".$especialista->especialista."',
                '".$especialista->e_mail."',
                '".$especialista->movil."',
                '".$especialista->colegiado."',
                '".$especialista->color."',
                '$date'
            )
        ";

        $SQL_especialista_nuevo_result = mysqli_query($link , $this->SQL_especialista_nuevo)or die(mysqli_error($link));
        echo $SQL_especialista_nuevo_result;
    }
  

}

$objDatos = json_decode(file_get_contents("php://input"));
$especialista_nuevo = new EspecialistaNuevo();
$especialista_nuevo->CreateEspecialista($objDatos);

?>