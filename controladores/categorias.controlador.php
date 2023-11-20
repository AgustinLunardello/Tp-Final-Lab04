<?php
class ControladorCategorias
{
    //Mostrar 
    static public function ctrMostrarCategorias($item, $valor)
    {
        $tabla = "categorias";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;
    }

    //Agregar usuario
    public function ctrAgregarCategoria()
    {
        if (isset($_POST["nombre_categoria"])) {
            if (!empty($this->ctrMostrarCategorias("nombre_categoria", $_POST["nombre_categoria"]))) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "La categoria ya existe",
                            text: "Ingrese una catgoria que no exista.!",
                          });
                    </script>';
                return;
            }
            $tabla = "categorias"; //nombre de la tabla
            $datos = array(
                "nombre_categoria" => $_POST["nombre_categoria"],
                "descripcion_categoria" => $_POST["descripcion_categoria"],
            );
            // print_r($datos);

            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloCategorias::mdlAgregarCategoria($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "categorias";
                    </script>';
            }
            // print_r($respuesta);
        }
    }

    //Editar usuario

    public function ctrEditarCategoria()
    {

        if (isset($_POST['id_categoria'])) {
            $categoria_existente = $this->ctrMostrarCategorias("nombre_categoria", $_POST["nombre_categoria"]);
            if (!empty($categoria_existente) && $categoria_existente["id_categoria"] != $_POST['id_categoria']) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "La categoria ya existe",
                            text: "Ingrese una catgoria que no exista.!",
                          });
                    </script>';
                return;
            }
            $tabla = "categorias"; //nombre de la tabla
            $datos = array(
                "nombre_categoria" => $_POST["nombre_categoria"],
                "descripcion_categoria" => $_POST["descripcion_categoria"],
                "id_categoria" => $_POST["id_categoria"],
            );
            // print_r($datos);
            // return;

            $url = ControladorPlantilla::url();

            $respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        window.location = "categorias";
                        </script>';
            }
        }
        // print_r($respuesta);
    }
    static public function ctrEliminarCategoria()
    {
        $url = ControladorPlantilla::url() . "categorias";

        if (isset($_GET["id_categoria"])) {
            $dato = $_GET["id_categoria"];
            $respuesta = ModeloCategorias::mdlEliminarCategoria($dato);

            if ($respuesta == "ok") {
                echo '<script> 
                fncSweetAlert("success", "La categoria se eliminó correctamente", "' . $url . '");
                </script>';
            }
            print_r($respuesta);
        }
    }

}

?>