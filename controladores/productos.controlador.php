<?php

class ControladorProductos
{
    //Mostrar usuarios
    static public function ctrMostrarProductos($item, $valor)
    {
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrMostrarCategorias()
    {
        $tabla = "categorias";
        $respuesta = ModeloProductos::mdlMostrarCategorias($tabla);
        return $respuesta;
    }

    //Agregar usuario
    public function ctrAgregarProducto()
    {
        $ancho = 40;
        $alto = 30;
        if (isset($_POST["nombre_producto"])) {
            if (!empty($this->ctrMostrarProductos('nombre_producto', $_POST['nombre_producto']))) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el producto",
                            text: "El producto ya existe.!",
                          });
                    </script>';
                return;
            }
            if (isset($_FILES["imagen_producto"]["tmp_name"])) {
                print_r($_FILES["imagen_producto"]);
                list($ancho, $alto) =
                    getimagesize($_FILES["imagen_producto"]["tmp_name"]);
                $nuevoAncho = $ancho;
                $nuevoAlto = $alto;
                $directorio = "./vistas/imagenes/productos/";
                mkdir($directorio, 0755, true);

                if ($_FILES["imagen_producto"]["type"] == "image/jpeg") {

                    $nombre =
                        funciones::generar_url($_POST["nombre_producto"]);
                    $imagen =
                        "./vistas/imagenes/productos/" . $nombre . ".jpeg";
                    $origen = imagecreatefromjpeg($_FILES["imagen_producto"]["tmp_name"]);
                    $destino = imagecreatetruecolor(
                        $nuevoAncho,
                        $nuevoAlto
                    );
                    imagecopyresized(
                        $destino,
                        $origen,
                        0,
                        0,
                        0,
                        0,
                        $nuevoAncho,
                        $nuevoAlto,
                        $ancho,
                        $alto
                    );
                    imagejpeg($destino, $imagen);
                }
                if ($_FILES["imagen_producto"]["type"] == "image/png") {

                    $nombre =
                        funciones::generar_url($_POST["nombre_producto"]);
                    $imagen =
                        "./vistas/imagenes/productos/" . $nombre . ".png";
                    $origen =
                        imagecreatefrompng($_FILES["imagen_producto"]["tmp_name"]);
                    $destino = imagecreatetruecolor(
                        $nuevoAncho,
                        $nuevoAlto
                    );
                    imagecopyresized(
                        $destino,
                        $origen,
                        0,
                        0,
                        0,
                        0,
                        $nuevoAncho,
                        $nuevoAlto,
                        $ancho,
                        $alto
                    );
                    imagepng($destino, $imagen);
                }
            }
            $tabla = "productos"; //nombre de la tabla
            $datos = array(
                "nombre_producto" => $_POST["nombre_producto"],
                "precio_producto" => $_POST["precio_producto"],
                "imagen_producto" => $imagen,
                "stock_producto" => $_POST["stock_producto"],
                "estado_producto" => $_POST['estado_producto'],
                "id_categoria" => $_POST['id_categoria']
            );

            $url = ControladorPlantilla::url();

            $respuesta = ModeloProductos::mdlAgregarProductos($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "productos";
                    </script>';
            }
            // print_r($respuesta);
        }
    }

    //Editar usuario

    public function ctrEditarProducto()
    {
        if (isset($_POST["id_producto"])) {
            $producto_existente = $this->ctrMostrarProductos('nombre_producto', $_POST['nombre_producto']);
            if (!empty($producto_existente) && $producto_existente["id_producto"] != $_POST['id_producto']) {
                echo
                    '<script> 
                        Swal.fire({
                            icon: "error",
                            title: "Error al ingresar el producto",
                            text: "El producto ya existe.!",
                          });
                    </script>';
                return;
            }

            $tabla = "productos"; //nombre de la tabla
            $datos = array(
                "nombre_producto" => $_POST["nombre_producto"],
                "precio_producto" => $_POST["precio_producto"],
                "imagen_producto" => $_FILES["imagen_producto"],
                "id_categoria" => $_POST["id_categoria"],
                "stock_producto" => $_POST['stock_producto'],
                "estado_producto" => $_POST['estado_producto'],
                "id_producto" => $_POST["id_producto"]
            );

            $url = ControladorPlantilla::url();

            $respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    window.location = "productos";
                    </script>';
            }
            // print_r($respuesta);
        }
    }
    static public function ctrEliminarProducto()
    {

        $url = ControladorPlantilla::url() . "productos";

        if (isset($_GET["id_producto"])) {
            $dato = $_GET["id_producto"];
            $respuesta = ModeloProductos::mdlEliminarProducto($dato);

            if ($respuesta == "ok") {
                echo '<script> 
                fncSweetAlert("success", "El producto se eliminó correctamente", "' . $url . '");
                </script>';

            }
        }
    }
}

?>