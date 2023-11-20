<?php

require_once 'conexion.php';

class ModeloTiposUsuarios
{
    static public function mdlMostrarTipos($tabla, $item, $valor)
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

    static public function mdlAgregarTipoUsuario($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_tipo_usuario,descripcion_tipo_usuario) 
            VALUES (:nombre_tipo_usuario,:descripcion_tipo_usuario)");

            $stmt->bindParam(":nombre_tipo_usuario", $datos["nombre_tipo_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion_tipo_usuario", $datos["descripcion_tipo_usuario"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarTipoUsuario($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
            nombre_tipo_usuario = :nombre_tipo_usuario,
            descripcion_tipo_usuario = :descripcion_tipo_usuario
            WHERE id_tipo_usuario = :id_tipo_usuario");

            $stmt->bindParam(":nombre_tipo_usuario", $datos["nombre_tipo_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion_tipo_usuario", $datos["descripcion_tipo_usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":id_tipo_usuario", $datos["id_tipo_usuario"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    static public function mdlEliminarTipoUsuario($dato)
    {
        if ($dato == 1) {
            return "admin";
        } else {
            try {
                $stmt = Conexion::conectar()->prepare("DELETE FROM tipos_usuarios WHERE id_tipo_usuario = :id_tipo_usuario");
                $stmt->bindParam(":id_tipo_usuario", $dato, PDO::PARAM_INT);
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
}