<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Productos</h1>
                    <?php
                    if ($_SESSION['tipo_usuario'] == 1) {
                        ?>
                        <a href="agregar_producto" class="btn btn-primary mt-3"><i class="fa-solid fa-user-plus"></i>
                            Agregar
                            producto</a>
                        <?php
                    }
                    ?>



                </div>
            </div>
        </div>

    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped tablaProductos">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $productos = ControladorProductos::ctrMostrarProductos(null, null);

                        if ($productos) {
                            foreach ($productos as $key => $value) {
                                if ($value["estado_producto"] == 1) {
                                    $estado = "<span class='badge badge-success'>Activo</span>";
                                } else {
                                    $estado = "<span class='badge badge-danger'>Inactivo</span>";
                                }

                                ?>
                                <tr>
                                    <td>
                                        <?php echo $value["nombre_producto"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $value["precio_producto"]; ?>
                                    </td>

                                    <td>
                                        <?php echo $value["nombre_categoria"]; ?>
                                    </td>

                                    <td>
                                        <?php echo $value["stock_producto"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $estado; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($_SESSION['tipo_usuario'] == 1) {
                                            ?>
                                            <a href="index.php?pagina=editar_producto&producto=<?php echo $value["id_producto"]; ?>"
                                                class="btn btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button id_producto=<?php echo $value["id_producto"]; ?> type="button"
                                                class="btn btn-danger btnEliminarProducto">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                            <?php
                                        } else {
                                            echo "No tienes acceso a estas acciones";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } ?>

                        </tfoot>
                </table>
            </div>

        </div>

    </section>
</div>
<script>
    $(".tablaProductos tbody").on("click", ".btnEliminarProducto", function () {
        let id_producto = $(this).attr("id_producto");

        swal
            .fire({
                title: "¿Está seguro de borrar este producto?",
                text: "¡Si no lo está puede cancelar la accíón!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Si, borrar!",
            })
            .then(function (result) {
                if (result.value) {
                    window.location =
                        "index.php?pagina=productos&id_producto=" + id_producto;
                }
            });
    });
</script>
<?php

$eliminar = new ControladorProductos();
$eliminar->ctrEliminarProducto();

?>