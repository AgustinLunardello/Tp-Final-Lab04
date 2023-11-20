<?php

require_once 'conexion.php';

class ModeloCategorias
{
    static public function mdlMostrarCategorias($tabla, $item, $valor)
    {
        if ($item != null) {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                "Error: " . $e->getMessage();
            }
        } else {
            try {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarCategoria($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_categoria,descripcion_categoria) 
            VALUES (:nombre_categoria,:descripcion_categoria)");

            $stmt->bindParam(":nombre_categoria", $datos["nombre_categoria"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion_categoria", $datos["descripcion_categoria"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarCategoria($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
            nombre_categoria = :nombre_categoria,
            descripcion_categoria = :descripcion_categoria
            WHERE id_categoria = :id_categoria");

            $stmt->bindParam(":nombre_categoria", $datos["nombre_categoria"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion_categoria", $datos["descripcion_categoria"], PDO::PARAM_STR);
            $stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    static public function mdlEliminarCategoria($dato)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM categorias WHERE id_categoria = :id_categoria");
            $stmt->bindParam(":id_categoria", $dato, PDO::PARAM_INT);
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