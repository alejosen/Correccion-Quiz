<?php
class Bodega extends conectar{
    public function get_bodega(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM bodega";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_bodega_x_id($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM bodega where id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_bodega($producto_id,$cantidad, $fecha_ingreso, $id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "UPDATE bodega SET 
        producto_id = ?,
        cantidad = ?,
        fecha_ingreso = ?
        WHERE id = ?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $producto_id);
        $sql->bindValue(2, $cantidad);
        $sql->bindValue(3, $fecha_ingreso);
        $sql->bindValue(4, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_bodega($id, $producto_id, $cantidad, $fecha_ingreso){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO bodega (id, producto_id, cantidad, fecha_ingreso) 
    VALUES (?, ?, ?, ?)";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->bindValue(2, $producto_id);
        $sql->bindValue(3, $cantidad);
        $sql->bindValue(4, $fecha_ingreso);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function delete_bodega($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "DELETE from bodega where
        id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    }

?>