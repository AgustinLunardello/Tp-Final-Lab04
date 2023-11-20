<?php
class ControladorTipos
{
    //Mostrar usuarios
    static public function ctrMostrarTipos($item, $valor)
    {
        $tabla = "tipos_usuarios";
        $respuesta = ModeloTiposUsuarios::mdlMostrarTipos($tabla, $item, $valor);
        return $respuesta;
    }

    //Agregar usuario
    public function ctrAgregarTipoUsuario()
    {
        if (isset($_POST["nombre_tipo_usuario"])) {
            if (!empty($this->ctrMostrarTipos("nombre_tipo_usuario", $_POST["nombre_tipo_usuario"]))) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "El tipo de usuario ya existe",
                            text: "Ingrese un tipo de usuario que no exista.!",
                          });
                    </script>';
                return;
            }
            $tabla = "tipos_usuarios"; //nombre de la tabla
            $datos = array(
                "nombre_tipo_usuario" => $_POST["nombre_tipo_usuario"],
                "descripcion_tipo_usuario" => $_POST["nombre_tipo_usuario"],
            );
            // print_r($datos);

            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloTiposUsuarios::mdlAgregarTipoUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "tipos_usuarios";
                    </script>';
            }
            // print_r($respuesta);
        }
    }

    //Editar usuario

    public function ctrEditarTipoUsuario()
    {

        if (isset($_POST['id_tipo_usuario'])) {
            $tipo_existente = $this->ctrMostrarTipos("nombre_tipo_usuario", $_POST["nombre_tipo_usuario"]);
            if (!empty($tipo_existente) && $tipo_existente["id_tipo_usuario"] != $_POST["id_tipo_usuario"]) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "El tipo de usuario ya existe",
                            text: "Ingrese un tipo de usuario que no exista.!",
                          });
                    </script>';
                return;
            }
            $tabla = "tipos_usuarios"; //nombre de la tabla
            $datos = array(
                "nombre_tipo_usuario" => $_POST["nombre_tipo_usuario"],
                "descripcion_tipo_usuario" => $_POST["descripcion_tipo_usuario"],
                "id_tipo_usuario" => $_POST["id_tipo_usuario"],
            );
            // print_r($datos);
            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloTiposUsuarios::mdlEditarTipoUsuario($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        window.location = "tipos_usuarios";
                        </script>';
            }
        }
        // print_r($respuesta);
    }
    static public function ctrEliminarTipoUsuario()
    {
        $url = ControladorPlantilla::url() . "tipos_usuarios";

        if (isset($_GET["id_tipo_usuario"])) {
            $tipo = self::ctrMostrarTipos("id_tipo_usuario", $_GET["id_tipo_usuario"]);
            if ($tipo["id_tipo_usuario"] == 1) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Accion denegada",
                            text: "No se permite eliminar al tipo de usuario administrador.!",
                          });
                    </script>';
                return;
            }
            $dato = $_GET["id_tipo_usuario"];
            $respuesta = ModeloTiposUsuarios::mdlEliminarTipoUsuario($dato);

            if ($respuesta == "ok") {
                echo '<script> 
                fncSweetAlert("success", "El Tipo de usuario se eliminó correctamente", "' . $url . '");
                </script>';

            } else if ($respuesta == 'admin') {
                echo '<script> 
                fncSweetAlert("error", "No se puede eliminar el Super Administrador", "' . $url . '");
                </script>';
            }
        }
    }
}

?>