<?php
class Salida extends conectar{

    public function update_salida($cantidad, $producto) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE producto SET cantidad = cantidad - ? WHERE producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cantidad);
        $sql->bindValue(2, $producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

    }

?>