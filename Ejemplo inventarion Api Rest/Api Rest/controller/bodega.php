<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../models/Bodega.php");
$bodega  = new Bodega();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){
    case "GetAll":
        $datos = $bodega->get_bodega();
        echo json_encode($datos);
        break;
        case "Getid":
            $datos=$bodega->get_bodega_x_id($body["id"]);
            echo json_encode($datos);
       break;


       case "Insert":
           $datos = $bodega->insert_bodega($body["id"],$body["producto_id"],$body["cantidad"],$body["fecha_ingreso"]);
           echo json_encode("Insert Correcto");
      break;


      case "Update":
       $datos = $bodega->update_bodega($body["producto_id"],$body["cantidad"],$body["fecha_ingreso"],);
       echo json_encode("Update Correcto");
  break;


      case "Delete":
       $datos=$bodega->delete_bodega($body["id"]);
       echo json_encode("Delete Correcto");
break;

}

?>