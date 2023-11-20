<?php
class ControladorEstadoCivil
{
    //Mostrar usuarios
    static public function ctrMostrarEstadosCiviles($item, $valor)
    {
        $tabla = "estados_civiles";
        $respuesta = ModeloEstadoCivil::mdlMostrarEstadosCiviles($tabla, $item, $valor);
        return $respuesta;
    }

    //Agregar usuario
    public function ctrAgregarEstadoCivil()
    {
        if (isset($_POST["nombre_estado_civil"])) {
            if (!empty($this->ctrMostrarEstadosCiviles("nombre_estado_civil", $_POST["nombre_estado_civil"]))) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "El estado civil ya existe",
                            text: "Ingrese un estado que no exista.!",
                          });
                    </script>';
                return;
            }
            $tabla = "estados_civiles"; //nombre de la tabla
            $datos = array(
                "nombre_estado_civil" => $_POST["nombre_estado_civil"],
                "descripcion_estado_civl" => $_POST["descripcion_estado_civl"],
            );
            // print_r($datos);

            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloEstadoCivil::mdlAgregarEstadoCivil($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "estados_civiles";
                    </script>';
            }
            // print_r($respuesta);
        }
    }

    //Editar usuario

    public function ctrEditarEstadoCivil()
    {

        if (isset($_POST['id_estado_civil'])) {
            $estado_existente = $this->ctrMostrarEstadosCiviles("nombre_estado_civil", $_POST["nombre_estado_civil"]);
            if (!empty($estado_existente) && $estado_existente["id_estado_civil"] != $_POST['id_estado_civil']) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "El estado civil ya existe",
                            text: "Ingrese un estado que no exista.!",
                          });
                    </script>';
                return;
            }
            $tabla = "estados_civiles"; //nombre de la tabla
            $datos = array(
                "nombre_estado_civil" => $_POST["nombre_estado_civil"],
                "descripcion_estado_civl" => $_POST["descripcion_estado_civl"],
                "id_estado_civil" => $_POST["id_estado_civil"],
            );
            // print_r($datos);
            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloEstadoCivil::mdlEditarEstadoCivil($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        window.location = "estados_civiles";
                        </script>';
            }
        }
        // print_r($respuesta);
    }
    static public function ctrEliminarEstadoCivil()
    {
        $url = ControladorPlantilla::url() . "estados_civiles";

        if (isset($_GET["id_estado_civil"])) {
            $dato = $_GET["id_estado_civil"];
            print_r($dato);
            $respuesta = ModeloEstadoCivil::mdlEliminarEstadoCivil($dato);

            if ($respuesta == "ok") {
                echo '<script> 
                fncSweetAlert("success", "El Estado Civil se eliminó correctamente", "' . $url . '");
                </script>';

            }
        }
    }
}

?>