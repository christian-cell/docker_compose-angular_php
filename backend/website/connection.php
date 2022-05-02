<?php

/* POO */

namespace smartCalendar;
include_once('cors.php');

class Conexion {

  protected $link;

  

  function Connect()
  {
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $host = $actual_link === "http://localhost:8080/" ? "db" : $_ENV["MYSQL_SERVICE_SERVICE_HOST"];
    
    
    $this->link = mysqli_connect($host , "root" , "secret" , "usuarios");
    return $this->link;
  }
}

$conexion_result = new Conexion();
$conexion_result->Connect();




?>
