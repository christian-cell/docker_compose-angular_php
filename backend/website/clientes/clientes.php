<?php

namespace website\clientes\clientes;
use website\conexion\Conexion;
require_once('../cors.php');
require_once("../conexion.php");

class Clientes {

  public function GetClientes():string
  {
    return "hola desde clientes";
  }

}

$clientes = new Clientes();
echo $clientes->GetClientes();

  

?>