<?php

/* POO */

namespace website\conexion;

class Conexion {

  // protected $link;

  

  public static function Connect()
  {
    $link = mysqli_connect("db" , "root" , "secret" , "usuarios");
    // var_dump($this->link);
    return $link;
  }
}



/********************************************************* host ***********************************************************/


/* $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link_parsed = parse_url($actual_link); */
/* var_dump($actual_link);
var_dump($actual_link_parsed['host']); */

/********************************************************* host ***********************************************************/
/* $conexion_result = new Conexion();
$conexion_result->Connect(); 
 */

?>