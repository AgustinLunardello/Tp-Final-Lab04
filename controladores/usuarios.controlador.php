<?php
class ControladorUsuarios
{
    //Mostrar usuarios
    static public function ctrMostrarUsuarios($item, $valor)
    {
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrMostrarTipos()
    {
        $tabla = "tipos_usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarTipos($tabla);
        return $respuesta;
    }

    //Agregar usuario
    public function ctrAgregarUsuario()
    {
        if (isset($_POST["nombre_usuario"])) {
            if (!$this->ctrValidarNombre($_POST["nombre_usuario"])) {
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
            if (!$this->ctrValidarNombre($_POST["apellido_usuario"])) {
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
            if (!$this->ctrValidarEmail($_POST["email_usuario"])) {
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
            if (!empty($this->ctrMostrarUsuarios('email_usuario', $_POST['email_usuario']))) {
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
            $ecriptar = crypt($_POST["password_usuario"], '$2a$07$usesomesillyhrdrrererherhe$');
            // $ecriptar = $_POST["password_usuario"];

            $tabla = "usuarios"; //nombre de la tabla
            $datos = array(
                "nombre_usuario" => $_POST["nombre_usuario"],
                "apellido_usuario" => $_POST["apellido_usuario"],
                "email_usuario" => $_POST["email_usuario"],
                "tipo_usuario" => intval($_POST["tipo_usuario"]),
                "password_usuario" => $ecriptar,
                "estado_usuario" => 0
            );
            // print_r($datos);

            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloUsuarios::mdlAgregarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "usuarios";
                    </script>';
            }
            // print_r($respuesta);
        }
    }

    //Editar usuario

    public function ctrEditarUsuario()
    {
        if (isset($_POST["id_usuario"])) {
            if ($_POST["password_usuario"] == "") {
                $password = ControladorUsuarios::ctrMostrarUsuarios("id_usuario", $_POST["id_usuario"]);

                $password = $password["password_usuario"];
            } else {
                $password = crypt($_POST["password_usuario"], '$2a$07$usesomesillyhrdrrererherhe$');
            }
            if (!$this->ctrValidarNombre($_POST["nombre_usuario"])) {
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
            if (!$this->ctrValidarNombre($_POST["apellido_usuario"])) {
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
            if (!$this->ctrValidarEmail($_POST["email_usuario"])) {
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
            $usuari_existente = $this->ctrMostrarUsuarios('email_usuario', $_POST['email_usuario']);
            if (!empty($usuari_existente) && $usuari_existente['id_usuario'] != $_POST["id_usuario"]) {
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
            $tabla = "usuarios"; //nombre de la tabla
            $datos = array(
                "nombre_usuario" => $_POST["nombre_usuario"],
                "apellido_usuario" => $_POST["apellido_usuario"],
                "email_usuario" => $_POST["email_usuario"],
                "tipo_usuario" => $_POST["tipo_usuario"],
                "password_usuario" => $password,
                "estado_usuario" => $_POST['estado_usuario'],
                "id_usuario" => $_POST["id_usuario"]
            );
            // print_r($datos);
            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "usuarios";
                    </script>';
            }
            // print_r($respuesta);
        }
    }
    static public function ctrEliminarUsuario()
    {

        $url = ControladorPlantilla::url() . "usuarios";

        if (isset($_GET["id_usuario"])) {

            $tipo = self::ctrMostrarUsuarios('id_usuario', $_GET['id_usuario']);

            if ($tipo["id_tipo_usuario"] == 1) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Accion denegada",
                            text: "No se permite eliminar a un usuario administrador.!",
                          });
                    </script>';
                return;
            }
            $dato = $_GET["id_usuario"];
            $respuesta = ModeloUsuarios::mdlEliminarUsuario($dato);

            if ($respuesta == "ok") {
                echo '<script> 
                fncSweetAlert("success", "El usuario se eliminó correctamente", "' . $url . '");
                </script>';

            }
        }
    }

    static public function ctrIngresoUsuario()
    {
        if (isset($_POST["ingresoEmail"])) {

            $url = ControladorPlantilla::url();

            if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $_POST["ingresoEmail"])) {
                $encriptar = crypt($_POST["ingresoPassword"], '$2a$07$usesomesillyhrdrrererherhe$');

                // $encriptar = $_POST["ingresoPassword"];

                $tabla = "usuarios";
                $item = "email_usuario";
                $valor = $_POST["ingresoEmail"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuarios(
                    $tabla,
                    $item,
                    $valor
                );

                if (
                    is_array($respuesta) && ($respuesta["email_usuario"] ==
                        $_POST["ingresoEmail"] && $respuesta["passwd_usuario"] == $encriptar)
                ) {

                    if ($respuesta["estado_usuario"] == 1) {
                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id_usuario"] = $respuesta["id_usuario"];
                        $_SESSION["nombre_usuario"] = $respuesta["nombre_usuario"];
                        $_SESSION["apellido_usuario"] = $respuesta["apellido_usuario"];
                        $_SESSION["email_usuario"] = $respuesta["email_usuario"];
                        $_SESSION["tipo_usuario"] = $respuesta["id_tipo_usuario"];


                        date_default_timezone_set('America/Argentina/Buenos_Aires');

                        $item1 = "fecha_ultima_login";
                        $valor1 = date('Y-m-d H:i:s');

                        $item2 = "id_usuario";
                        $valor2 = $respuesta["id_usuario"];

                        $ultimoLogin = ModeloUsuarios::mdlActualizarLogin($tabla, $item1, $valor1, $item2, $valor2);

                        echo '<script>
                       window.location = "' . $url . '"
                        </script>';

                    } else {
                        echo '<br>
                        <div class="alert alert-danger">El usuario aún no está activado</div>';
                    }
                } else {
                    echo
                        '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al iniciar sesion",
                            text: "El correo o la contraseña son incorrectas!",
                          });
                    </script>';
                }
            }
        }
    }
    private function ctrValidarNombre($nombre)
    {
        return preg_match('/^[a-zA-Z]+$/', $nombre);
    }
    private function ctrValidarEmail($correo)
    {
        return preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][azA-Z0-9_]+)*[.][a-zAZ]{2,4}$/', $correo);
    }
}

?>