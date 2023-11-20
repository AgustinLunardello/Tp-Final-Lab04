<?php

require_once 'conexion.php';

class ModeloProductos
{

    static public function mdlMostrarProductos($tabla, $item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                //enlace de parametros
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS p INNER JOIN categorias as c ON p.id_categoria = c.id_categoria");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                "Error: " . $e->getMessage();
            }
        }
    }
    static public function mdlMostrarCategorias($tabla)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            "Error: " . $e->getMessage();
        }
    }

    static public function mdlAgregarProductos($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_producto,precio_producto ,imagen_producto,stock_producto ,estado_producto, id_categoria) 
            VALUES (:nombre_producto,:precio_producto ,:imagen_producto, :stock_producto, :estado_producto, :id_categoria)");

            $stmt->bindParam(":nombre_producto", $datos["nombre_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_producto", $datos["precio_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen_producto", $datos["imagen_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":stock_producto", $datos["stock_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":estado_producto", $datos["estado_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarProducto($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
            nombre_producto = :nombre_producto,
            precio_producto = :precio_producto,
            imagen_producto = :imagen_producto,
            id_categoria = :id_categoria,
            stock_producto = :stock_producto,
            estado_producto = :estado_producto 
            WHERE id_producto = :id_producto");

            $stmt->bindParam(":nombre_producto", $datos["nombre_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":precio_producto", $datos["precio_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen_producto", $datos["imagen_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
            $stmt->bindParam(":stock_producto", $datos["stock_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":estado_producto", $datos["estado_producto"], PDO::PARAM_INT);
            $stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    static public function mdlEliminarProducto($producto)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM productos WHERE id_producto = :id_producto");
            $stmt->bindParam(":id_producto", $producto, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}