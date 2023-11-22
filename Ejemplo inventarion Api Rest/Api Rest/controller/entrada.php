<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../models/Entrada.php");
$entrada  = new Entrada();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){
    case "GetAll":
        $datos = $entrada->get_entrada();
        echo json_encode($datos);
        break;
        case "Getid":
            $datos=$entrada->get_entrada_x_id($body["id_entrada"]);
            echo json_encode($datos);
       break;


       case "Insert":
        $datos = $entrada->insert_entrada($body["id_producto"], $body["producto"], $body["fecha_entrada"], $body["cantidad"], $body["precio"]);
        echo json_encode(["mensaje" => $datos]);
        break;
        


      case "Update":
        $datos = $entrada->update_entrada($body["cantidad"],$body["producto"]);
        echo json_encode("Update Correcto");
        break;
    


      case "Delete":
       $datos=$entrada->delete_entrada($body["id_entrada"]);
       echo json_encode("Delete Correcto");
break;

}

?>