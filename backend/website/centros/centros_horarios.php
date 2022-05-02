<?php

namespace website\centros\centroHorario;
use website\conexion\Conexion;
require_once('../cors.php');
require_once("../conexion.php");

class CargarHorariosCentro {

    private $SQL_horarios_centro;
  
    /* 
    * @params le pasamos el cuerpo del post
    */

    public function GetHorariosCentro()
    {
        $link = Conexion::Connect();
        $id_centro = '1';
        $this->SQL_horarios_centro = "
           SELECT * FROM centro_horarios WHERE id_centro = '$id_centro'
        ";

        $datos = mysqli_query($link , $this->SQL_horarios_centro)or die(mysqli_error($link));
        if(mysqli_num_rows($datos) > 0){

            $fila = 0;

            while ($dato = mysqli_fetch_array($datos)) {
                $arr[$fila]['id_centro'] = $dato['id_centro'];
                $arr[$fila]['lunes_apertura_manana'] = $dato['lunes_apertura_manana'];
                $arr[$fila]['lunes_cierre_manana'] = $dato['lunes_cierre_manana'];
                $arr[$fila]['lunes_apertura_tarde'] = $dato['lunes_apertura_tarde'];
                $arr[$fila]['lunes_cierre_tarde'] = $dato['lunes_cierre_tarde'];
                $arr[$fila]['martes_apertura_manana'] = $dato['martes_apertura_manana'];
                $arr[$fila]['martes_cierre_manana'] = $dato['martes_cierre_manana'];
                $arr[$fila]['martes_apertura_tarde'] = $dato['martes_apertura_tarde'];
                $arr[$fila]['martes_cierre_tarde'] = $dato['martes_cierre_tarde'];
                $arr[$fila]['miercoles_apertura_manana'] = $dato['miercoles_apertura_manana'];
                $arr[$fila]['miercoles_cierre_manana'] = $dato['miercoles_cierre_manana'];
                $arr[$fila]['miercoles_apertura_tarde'] = $dato['miercoles_apertura_tarde'];
                $arr[$fila]['miercoles_cierre_tarde'] = $dato['miercoles_cierre_tarde'];
                $arr[$fila]['jueves_apertura_manana'] = $dato['jueves_apertura_manana'];
                $arr[$fila]['jueves_cierre_manana'] = $dato['jueves_cierre_manana'];
                $arr[$fila]['jueves_apertura_tarde'] = $dato['jueves_apertura_tarde'];
                $arr[$fila]['jueves_cierre_tarde'] = $dato['jueves_cierre_tarde'];
                $arr[$fila]['viernes_apertura_manana'] = $dato['viernes_apertura_manana'];
                $arr[$fila]['viernes_cierre_manana'] = $dato['viernes_cierre_manana'];
                $arr[$fila]['viernes_apertura_tarde'] = $dato['viernes_apertura_tarde'];
                $arr[$fila]['viernes_cierre_tarde'] = $dato['viernes_cierre_tarde'];
                $arr[$fila]['sabado_apertura_manana'] = $dato['sabado_apertura_manana'];
                $arr[$fila]['sabado_cierre_manana'] = $dato['sabado_cierre_manana'];
                $arr[$fila]['sabado_apertura_tarde'] = $dato['sabado_apertura_tarde'];
                $arr[$fila]['sabado_cierre_tarde'] = $dato['sabado_cierre_tarde'];
                $arr[$fila]['domingo_apertura_manana'] = $dato['domingo_apertura_manana'];
                $arr[$fila]['domingo_cierre_manana'] = $dato['domingo_cierre_manana'];
                $arr[$fila]['domingo_apertura_tarde'] = $dato['domingo_apertura_tarde'];
                $arr[$fila]['domingo_cierre_tarde'] = $dato['domingo_cierre_tarde'];

                $fila ++;
            }
        } else {
            $arr = "centro_sin_horarios";
        }

        echo json_encode($arr); 
    } 
  

}

$objDatos = json_decode(file_get_contents("php://input"));
$especialista_nuevo = new CargarHorariosCentro();
$especialista_nuevo->GetHorariosCentro(); 

?>