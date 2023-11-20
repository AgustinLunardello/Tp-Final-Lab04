<?php

require_once 'conexion.php';

class ModeloClientes
{

    static public function mdlMostrarClientes($tabla, $item, $valor)
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
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla AS c INNER JOIN estados_civiles as ev ON c.id_estado_civil = ev.id_estado_civil");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                "Error: " . $e->getMessage();
            }
        }
    }
    static public function mdlMostrarEstadoCivil($tabla)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            "Error: " . $e->getMessage();
        }
    }

    static public function mdlAgregarClientes($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_cliente,apellido_cliente ,email_cliente,dni_cliente ,fecha_nacimiento, id_estado_civil) 
            VALUES (:nombre_cliente,:apellido_cliente ,:email_cliente, :dni_cliente, :fecha_nacimiento, :id_estado_civil)");

            $stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_cliente", $datos["apellido_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":email_cliente", $datos["email_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":dni_cliente", $datos["dni_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":id_estado_civil", $datos["id_estado_civil"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarCliente($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
            nombre_cliente = :nombre_cliente,
            apellido_cliente = :apellido_cliente,
            email_cliente = :email_cliente,
            dni_cliente = :dni_cliente,
            fecha_nacimiento = :fecha_nacimiento,
            id_estado_civil = :id_estado_civil 
            WHERE id_cliente = :id_cliente");

            $stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido_cliente", $datos["apellido_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":email_cliente", $datos["email_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":dni_cliente", $datos["dni_cliente"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":id_estado_civil", $datos["id_estado_civil"], PDO::PARAM_INT);
            $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
    static public function mdlEliminarCliente($cliente)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM clientes WHERE id_cliente = :id_cliente");
            $stmt->bindParam(":id_cliente", $cliente, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    static public function mdlEdadCliente($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT TIMESTAMPDIFF(YEAR,:fecha_nacimiento,CURRENT_TIMESTAMP()) AS edad FROM $tabla WHERE id_cliente = :id_cliente");
            $stmt->bindParam(":fecha_nacimiento", $datos['fecha_nacimiento'], PDO::PARAM_STR);
            $stmt->bindParam(":id_cliente", $datos['id_cliente'], PDO::PARAM_INT);
            if ($stmt->execute()) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }else{
                return "error";
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}