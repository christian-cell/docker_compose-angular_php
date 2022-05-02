<?php

namespace website\usuarios\UsuarioNuevo;
use website\conexion\Conexion;
require_once('../cors.php');
require_once("../conexion.php");

class UsuarioNuevo {

    private $SQL_usuario_nuevo;
  
    /* 
    * @params le pasamos el cuerpo del post
    */

    public function CreateUsuario($usuario)
    {

        $hash_key = md5($usuario->clave);

        // var_dump($usuario);
        $link = Conexion::Connect();

        $date = date('Y/m/d h:i:s', time());

        $this->SQL_usuario_nuevo = "
            INSERT INTO `usuarios`(
                `usuario`,
                `email`,
                `clave`,
                `rol`
            )VALUES(
                '".$usuario->usuario."',
                '".$usuario->email."',
                '$hash_key',
                '".$usuario->rol."'            
            )
        ";

        $SQL_usuario_nuevo_result = mysqli_query($link , $this->SQL_usuario_nuevo)or die(mysqli_error($link));
        echo $SQL_usuario_nuevo_result; 
    }
  

}

$objDatos = json_decode(file_get_contents("php://input"));
$usuario_nuevo = new UsuarioNuevo();
$usuario_nuevo->CreateUsuario($objDatos);

?>