<?php

namespace website\usuarios\login;

use mysqli;
use website\conexion\Conexion;
require_once('../cors.php');
require_once("../conexion.php");

class Login {

  
  private $SQL_usuarios ;
  private $SQL_insert_sesiones;
  private $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

  public function generate_string(string $input , int $strength = 16): string 
  {
		$input_length = strlen($input);
		$random_string = '';
		for($i = 0; $i < $strength; $i++) {
			$random_character = $input[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
		return $random_string;
	}

  public function getUsers($usuario)
  {

    $link = Conexion::Connect();
    
    $this->SQL_usuarios = "
      SELECT * FROM usuarios 
      WHERE usuario LIKE '%".$usuario->usuario."%'
    ";

    $SQL_usuarios_result = mysqli_query($link , $this->SQL_usuarios)or die(mysqli_error($link));
    if(mysqli_num_rows($SQL_usuarios_result) > 0){

      $dato = mysqli_fetch_array($SQL_usuarios_result);

      $hash_key = $dato['clave'];

      if (md5($usuario->clave) === $hash_key) {
        
        $dato['token'] = $this->generate_string($this->permitted_chars,50); 
        
        $this->SQL_insert_sesiones = "
          INSERT INTO `usuarios_sesiones` (
            `usuario`,
            `token`,
            `creada`,
            `caduca`
          ) VALUES (
            '".$dato['id_usuario']."',
            '".$dato['token']."',
            '".date("Y-m-d H:i:s")."',
            '".date("Y-m-d H:i:s", strtotime('+5 hour'))."'
          )
        ";

        $SQL_insert_sesiones = mysqli_query($link , $this->SQL_insert_sesiones)or die(mysqli_error($link));
        
        echo json_encode($dato);        


      } else {
        echo "INCORRECTO , esta clave no corresponde a este usuario";
      }

    } else {
      echo "usuario no registrado";
    }
  }
  
  public function login($usuario)
  {
    $this->getUsers($usuario);
  }

}

$login = new Login();
$objDatos = json_decode(file_get_contents("php://input"));
echo $login->login($objDatos)

?>