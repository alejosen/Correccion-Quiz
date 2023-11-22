<?php
class Producto extends conectar{
    public function get_bodega(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM producto";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_producto_x_id($id_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM producto where id_producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_producto($producto, $precio, $cantidad, $id_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "UPDATE producto SET 
        producto = ?,
        precio = ?,
        cantidad = ?
        WHERE id_producto = ?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $producto);
        $sql->bindValue(2, $precio);
        $sql->bindValue(3, $cantidad);
        $sql->bindValue(4, $id_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_producto($id_producto, $producto,$precio, $cantidad){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO producto (id_producto, producto, precio, cantidad) 
    VALUES (?, ?, ?, ?)";
    
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_producto);
        $sql->bindValue(2, $producto);
        $sql->bindValue(3, $precio);
        $sql->bindValue(4, $cantidad);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function delete_producto($id_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "DELETE from producto where
        id_producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    }

?>