<?php
class Entrada extends conectar{
    public function get_entrada(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM entrada";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_entrada_x_id($id_entrada){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM entrada where id_entrada = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_entrada);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_entrada($cantidad, $producto) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE producto SET cantidad = cantidad + ? WHERE producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cantidad);
        $sql->bindValue(2, $producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_entrada($id_producto, $producto, $fecha_entrada, $cantidad, $precio){
            $conectar = parent::conexion();
            parent::set_names();
        
            try {
                $conectar->beginTransaction();
                $sql_entrada = "INSERT INTO entrada (id_producto, producto, fecha_entrada, cantidad, precio) 
                                VALUES (?, ?, ?, ?, ?)";
                $stmt_entrada = $conectar->prepare($sql_entrada);
                $stmt_entrada->bindValue(1, $id_producto);
                $stmt_entrada->bindValue(2, $producto);
                $stmt_entrada->bindValue(3, $fecha_entrada);
                $stmt_entrada->bindValue(4, $cantidad);
                $stmt_entrada->bindValue(5, $precio);
                $stmt_entrada->execute();
                $lastInsertId = $conectar->lastInsertId();
                $sql_producto = "INSERT INTO producto (id_producto, producto, precio, cantidad) 
                 VALUES (?, ?, ?, ?)";
                $stmt_producto = $conectar->prepare($sql_producto);
                $stmt_producto->bindValue(1, $lastInsertId);
                $stmt_producto->bindValue(2, $producto);
                $stmt_producto->bindValue(3, $precio);
                $stmt_producto->bindValue(4, $cantidad);
                $stmt_producto->execute();

        
                $conectar->commit();
                return "Insert Correcto";
            } catch (Exception $e) {
                $conectar->rollBack();
                return "Error en la transacción: " . $e->getMessage();
            }
        }
        
    
    public function delete_producto($id_entrada){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "DELETE from entrada where
        id_entrada = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_entrada);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    }

?>