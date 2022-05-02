<?php

namespace website\centros\centroHorario;
use website\conexion\Conexion;
require_once('../cors.php');
require_once("../conexion.php");

class CentroHorarioNuevo {

    private $SQL_especialista_nuevo;
  
    /* 
    * @params le pasamos el cuerpo del post
    */

    public function CreateHorario($horario)
    {
        $link = Conexion::Connect();
        // $horario->id_centro = '1';

        $lunes_apertura_manana = (!isset($horario->lunes_apertura_manana))? null : $horario->lunes_apertura_manana;
        $lunes_cierre_manana = (!isset($horario->lunes_cierre_manana))? null : $horario->lunes_cierre_manana;
        $lunes_apertura_tarde = (!isset($horario->lunes_apertura_tarde))? null : $horario->lunes_apertura_tarde;
        $lunes_cierre_tarde = (!isset($horario->lunes_cierre_tarde))? null : $horario->lunes_cierre_tarde;
        $martes_apertura_manana = (!isset($horario->martes_apertura_manana))? null : $horario->martes_apertura_manana;
        $martes_cierre_manana = (!isset($horario->martes_cierre_manana))? null : $horario->martes_cierre_manana;
        $martes_apertura_tarde = (!isset($horario->martes_apertura_tarde))? null : $horario->martes_apertura_tarde;
        $martes_cierre_tarde = (!isset($horario->martes_cierre_tarde))? null : $horario->martes_cierre_tarde;
        $miercoles_apertura_manana = (!isset($horario->miercoles_apertura_manana))? null : $horario->miercoles_apertura_manana;
        $miercoles_cierre_manana = (!isset($horario->miercoles_cierre_manana))? null : $horario->miercoles_cierre_manana;
        $miercoles_apertura_tarde = (!isset($horario->miercoles_apertura_tarde))? null : $horario->miercoles_apertura_tarde;
        $miercoles_cierre_tarde = (!isset($horario->miercoles_cierre_tarde))? null : $horario->miercoles_cierre_tarde;
        $jueves_apertura_manana = (!isset($horario->jueves_apertura_manana))? null : $horario->jueves_apertura_manana;
        $jueves_cierre_manana = (!isset($horario->jueves_cierre_manana))? null : $horario->jueves_cierre_manana;
        $jueves_apertura_tarde = (!isset($horario->jueves_apertura_tarde))? null : $horario->jueves_apertura_tarde;
        $jueves_cierre_tarde = (!isset($horario->jueves_cierre_tarde))? null : $horario->jueves_cierre_tarde;
        $viernes_apertura_manana = (!isset($horario->viernes_apertura_manana))? null : $horario->viernes_apertura_manana;
        $viernes_cierre_manana = (!isset($horario->viernes_cierre_manana))? null : $horario->viernes_cierre_manana;
        $viernes_apertura_tarde = (!isset($horario->viernes_apertura_tarde))? null : $horario->viernes_apertura_tarde;
        $viernes_cierre_tarde = (!isset($horario->viernes_cierre_tarde))? null : $horario->viernes_cierre_tarde;
        $sabado_apertura_manana = (!isset($horario->sabado_apertura_manana))? null : $horario->sabado_apertura_manana;
        $sabado_cierre_manana = (!isset($horario->sabado_cierre_manana))? null : $horario->sabado_cierre_manana;
        $sabado_apertura_tarde = (!isset($horario->sabado_apertura_tarde))? null : $horario->sabado_apertura_tarde;
        $sabado_cierre_tarde = (!isset($horario->sabado_cierre_tarde))? null : $horario->sabado_cierre_tarde;
        $domingo_apertura_manana = (!isset($horario->domingo_apertura_manana))? null : $horario->domingo_apertura_manana;
        $domingo_cierre_manana = (!isset($horario->domingo_cierre_manana))? null : $horario->domingo_cierre_manana;
        $domingo_apertura_tarde = (!isset($horario->domingo_apertura_tarde))? null : $horario->domingo_apertura_tarde;
        $domingo_cierre_tarde = (!isset($horario->domingo_cierre_tarde))? null : $horario->domingo_cierre_tarde;

        $id_centro = '1';

        $this->SQL_especialista_nuevo = "
            INSERT INTO `centro_horarios`(
                /* 1 */`id_centro`,
                /* 2 */`lunes_apertura_manana`,
                /* 3 */`lunes_cierre_manana`,
                /* 4 */`lunes_apertura_tarde`,
                /* 5 */`lunes_cierre_tarde`,
                /* 6 */`martes_apertura_manana`,
                /* 7 */`martes_cierre_manana`,
                /* 8 */`martes_apertura_tarde`,
                /* 9 */`martes_cierre_tarde`,
                /* 10 */`miercoles_apertura_manana`,
                /* 11 */`miercoles_cierre_manana`,
                /* 12 */`miercoles_apertura_tarde`,
                /* 13 */`miercoles_cierre_tarde`,
                /* 14 */`jueves_apertura_manana`,
                /* 15 */`jueves_cierre_manana`,
                /* 16 */`jueves_apertura_tarde`,
                /* 17 */`jueves_cierre_tarde`,
                /* 18 */`viernes_apertura_manana`,
                /* 19 */`viernes_cierre_manana`,
                /* 20 */`viernes_apertura_tarde`,
                /* 21 */`viernes_cierre_tarde`,
                /* 22 */`sabado_apertura_manana`,
                /* 23 */`sabado_cierre_manana`,
                /* 24 */`sabado_apertura_tarde`,
                /* 25 */`sabado_cierre_tarde`,
                /* 26 */`domingo_apertura_manana`,
                /* 27 */`domingo_cierre_manana`,
                /* 28 */`domingo_apertura_tarde`,
                /* 29 */`domingo_cierre_tarde`
            )VALUES(
                /* 1 */'$id_centro',
                /* 2 */'$lunes_apertura_manana',
                /* 3 */'$lunes_cierre_manana',
                /* 4 */'$lunes_apertura_tarde',
                /* 5 */'$lunes_cierre_tarde',
                /* 6 */'$martes_apertura_manana',
                /* 7 */'$martes_cierre_manana',
                /* 8 */'$martes_apertura_tarde',
                /* 9 */'$martes_cierre_tarde',
                /* 10 */'$miercoles_apertura_manana',
                /* 11 */'$miercoles_cierre_manana',
                /* 12 */'$miercoles_apertura_tarde',
                /* 13 */'$miercoles_cierre_tarde',
                /* 14 */'$jueves_apertura_manana',
                /* 15 */'$jueves_cierre_manana',
                /* 16 */'$jueves_apertura_tarde',
                /* 17 */'$jueves_cierre_tarde',
                /* 18 */'$viernes_apertura_manana',
                /* 19 */'$viernes_cierre_manana',
                /* 20 */'$viernes_apertura_tarde',
                /* 21 */'$viernes_cierre_tarde',
                /* 22 */'$sabado_apertura_manana',
                /* 23 */'$sabado_cierre_manana',
                /* 24 */'$sabado_apertura_tarde',
                /* 25 */'$sabado_cierre_tarde',
                /* 26 */'$domingo_apertura_manana',
                /* 27 */'$domingo_cierre_manana',
                /* 28 */'$domingo_apertura_tarde',
                /* 29 */'$domingo_cierre_tarde'
            )
        ";

        $SQL_especialista_nuevo_result = mysqli_query($link , $this->SQL_especialista_nuevo)or die(mysqli_error($link));
        echo $SQL_especialista_nuevo_result;
    } 
  

}

$objDatos = json_decode(file_get_contents("php://input"));
$especialista_nuevo = new CentroHorarioNuevo();
$especialista_nuevo->CreateHorario($objDatos); 

?>