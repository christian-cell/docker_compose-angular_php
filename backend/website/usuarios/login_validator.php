<?php

namespace website\usuarios\login;

use mysqli;
use website\conexion\Conexion;
require_once('../cors.php');
require_once("../conexion.php");

class LoginValidator {

    public static function validateSession($token)
    {
       $link = Conexion::Connect();

       if (isset($token)) {
		
        $token = $token;
        } else {
            $objDatos = json_decode(file_get_contents("php://input"));
            $token = $objDatos->token;
        }


        $SQL = "
            SELECT * FROM `usuarios_sesiones` 
            WHERE token = '$token' AND caduca > NOW()
        ";
        $respval1 = mysqli_query($link,$SQL) or die(mysqli_error($link));
        $ok = mysqli_num_rows($respval1);
        
        if ($ok > 0) {
            $SQL = "UPDATE `usuarios_sesiones` SET caduca = '".date("Y-m-d H:i:s", strtotime('+5 hour'))."' WHERE token = '$token'";
            $respval2 = mysqli_query($link,$SQL) or die(mysqli_error($link));	
        } else {
            exit();
        }

    }
  

}

$login = new LoginValidator();
$objDatos = json_decode(file_get_contents("php://input"));

?>