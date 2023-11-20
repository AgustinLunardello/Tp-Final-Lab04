<?php

require_once 'conexion.php';

class ModeloEstadoCivil
{
    static public function mdlMostrarEstadosCiviles($tabla, $item, $valor)
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

    static public function mdlAgregarEstadoCivil($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_estado_civil,descripcion_estado_civl) 
            VALUES (:nombre_estado_civil,:descripcion_estado_civl)");

            $stmt->bindParam(":nombre_estado_civil", $datos["nombre_estado_civil"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion_estado_civl", $datos["descripcion_estado_civl"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarEstadoCivil($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
            nombre_estado_civil = :nombre_estado_civil,
            descripcion_estado_civl = :descripcion_estado_civl
            WHERE id_estado_civil = :id_estado_civil");

            $stmt->bindParam(":nombre_estado_civil", $datos["nombre_estado_civil"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion_estado_civl", $datos["descripcion_estado_civl"], PDO::PARAM_STR);
            $stmt->bindParam(":id_estado_civil", $datos["id_estado_civil"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    static public function mdlEliminarEstadoCivil($dato)
    {

        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM estados_civiles WHERE id_estado_civil = :id_estado_civil");
            $stmt->bindParam(":id_estado_civil", $dato, PDO::PARAM_INT);
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