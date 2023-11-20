<?php
class ControladorClientes
{
    //Mostrar usuarios
    static public function ctrMostrarClientes($item, $valor)
    {
        $tabla = "clientes";
        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrMostrarEstadosCiviles()
    {
        $tabla = "estados_civiles";
        $respuesta = ModeloClientes::mdlMostrarEstadoCivil($tabla);
        return $respuesta;
    }

    //Agregar usuario
    public function ctrAgregarCliente()
    {
        if (isset($_POST["nombre_cliente"])) {
            if (!$this->ctrValidarNombre($_POST["nombre_cliente"])) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el nombre",
                            text: "El nombre solo debe contener letras!",
                          });
                    </script>';
                return;
            }
            if (!$this->ctrValidarNombre($_POST["apellido_cliente"])) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el apellido",
                            text: "El apellido solo debe contener letras!",
                          });
                    </script>';
                return;
            }
            if (!$this->ctrValidarEmail($_POST["email_cliente"])) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el email",
                            text: "El email no es válido. Ingresa una dirección de email válida.!",
                          });
                    </script>';
                return;
            }
            if (!$this->ctrValidarDNI($_POST["dni_cliente"])) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el DNI",
                            text: "El DNI dolo debe contener numeros.!",
                          });
                    </script>';
                return;
            }
            if (!empty($this->ctrMostrarClientes('email_cliente', $_POST['email_cliente']))) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el email",
                            text: "El email ya existe. Ingresa una dirección de email que no exista.!",
                          });
                    </script>';
                return;
            }
            if (!empty($this->ctrMostrarClientes('dni_cliente', $_POST['dni_cliente']))) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el DNI",
                            text: "El DNI ya existe. Ingresa una n° de documento que no exista.!",
                          });
                    </script>';
                return;
            }
            $tabla = "clientes"; //nombre de la tabla
            $datos = array(
                "nombre_cliente" => $_POST["nombre_cliente"],
                "apellido_cliente" => $_POST["apellido_cliente"],
                "email_cliente" => $_POST["email_cliente"],
                "dni_cliente" => $_POST["dni_cliente"],
                "fecha_nacimiento" => $_POST['fecha_nacimiento'],
                "id_estado_civil" => $_POST['id_estado_civil']
            );
            // print_r($datos);

            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloClientes::mdlAgregarClientes($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "clientes";
                    </script>';
            }
            print_r($respuesta);
        }
    }

    //Editar usuario

    public function ctrEditarCliente()
    {
        if (isset($_POST["id_cliente"])) {
            if (!$this->ctrValidarNombre($_POST["nombre_cliente"])) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el nombre",
                            text: "El nombre solo debe contener letras!",
                          });
                    </script>';
                return;
            }
            if (!$this->ctrValidarNombre($_POST["apellido_cliente"])) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el apellido",
                            text: "El apellido solo debe contener letras!",
                          });
                    </script>';
                return;
            }
            if (!$this->ctrValidarEmail($_POST["email_cliente"])) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el email",
                            text: "El email no es válido. Ingresa una dirección de email válida.!",
                          });
                    </script>';
                return;
            }
            if (!$this->ctrValidarDNI($_POST["dni_cliente"])) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el DNI",
                            text: "El DNI dolo debe contener numeros.!",
                          });
                    </script>';
                return;
            }
            $cliente_existente = $this->ctrMostrarClientes('email_cliente', $_POST['email_cliente']);
            if (!empty($cliente_existente) && $cliente_existente["id_cliente"] != $_POST["id_cliente"]) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el email",
                            text: "El email ya existe. Ingresa una dirección de email que no exista.!",
                          });
                    </script>';
                return;
            }
            $cliente_existente = $this->ctrMostrarClientes('dni_cliente', $_POST['dni_cliente']);
            if (!empty($cliente_existente) && $cliente_existente["id_cliente"] != $_POST["id_cliente"]) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el DNI",
                            text: "El DNI ya existe. Ingresa una n° de documento que no exista.!",
                          });
                    </script>';
                return;
            }

            $tabla = "clientes"; //nombre de la tabla
            $datos = array(
                "nombre_cliente" => $_POST["nombre_cliente"],
                "apellido_cliente" => $_POST["apellido_cliente"],
                "email_cliente" => $_POST["email_cliente"],
                "dni_cliente" => $_POST["dni_cliente"],
                "fecha_nacimiento" => $_POST['fecha_nacimiento'],
                "id_estado_civil" => $_POST['id_estado_civil'],
                "id_cliente" => $_POST["id_cliente"]
            );
            // print_r($datos);
            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "clientes";
                    </script>';
            }
            // print_r($respuesta);
        }
    }
    static public function ctrEliminarCliente()
    {

        $url = ControladorPlantilla::url() . "clientes";

        if (isset($_GET["id_cliente"])) {
            $dato = $_GET["id_cliente"];
            $respuesta = ModeloClientes::mdlEliminarCliente($dato);

            if ($respuesta == "ok") {
                echo '<script> 
                fncSweetAlert("success", "El cliente se eliminó correctamente", "' . $url . '");
                </script>';

            }
        }
    }
    static public function ctrCalcularEdad($fecha_nacimineto, $id_cliente)
    {
        $tabla = "clientes";
        $datos = array(
            "fecha_nacimiento" => $fecha_nacimineto,
            "id_cliente" => $id_cliente
        );
        $respuesta = ModeloClientes::mdlEdadCliente($tabla, $datos);
        if ($respuesta != "error") {
            return $respuesta['edad'];
        } else {
            echo "Hubo un error para calcular la edad";
        }
    }
    private function ctrValidarNombre($nombre)
    {
        return preg_match('/^[a-zA-Z]+$/', $nombre);
    }
    private function ctrValidarDNI($dni)
    {
        return preg_match('/^[0-9]+$/', $dni);
    }
    private function ctrValidarEmail($correo)
    {
        return preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $correo);
    }
}

?>