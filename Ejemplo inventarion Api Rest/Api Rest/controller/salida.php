<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../models/Salida.php");
$salida  = new Salida();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){


      case "Update":
        $datos = $salida->update_salida($body["cantidad"],$body["producto"]);
        echo json_encode("Update Correcto");
        break;

}

?>