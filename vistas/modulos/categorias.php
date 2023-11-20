<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categorias</h1>

                    <a href="agregar_categoria" class="btn btn-primary mt-3"><i class="fa-solid fa-user-plus"></i>
                        Agregar Categoria</a>

                </div>
            </div>
        </div>

    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped tablaCategoria">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Fecha Creacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $categorias = ControladorCategorias::ctrMostrarCategorias(null, null);

                        if ($categorias) {
                            foreach ($categorias as $key => $value) {
                                $fecha_formateada = funciones::formatearFecha($value["fecha_creacion"]);
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $value["nombre_categoria"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $value["descripcion_categoria"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $fecha_formateada; ?>
                                    </td>

                                    <td>
                                        <a href="index.php?pagina=editar_categoria&categoria=<?php echo $value["id_categoria"]; ?>"
                                            class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button id_categoria=<?php echo $value["id_categoria"]; ?> type="button"
                                            class="btn btn-danger btnEliminarCategoria">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                        } ?>

                    </tbody>
                </table>
            </div>

        </div>

    </section>
</div>
<script>
    $(".tablaCategoria tbody").on("click", ".btnEliminarCategoria", function () {
        let id_categoria = $(this).attr("id_categoria");

        swal
            .fire({
                title: "¿Está seguro de borrar esta categoria?",
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
                        "index.php?pagina=categorias&id_categoria=" + id_categoria;
                }
            });
    });
</script>
<?php

$eliminar = new ControladorCategorias();
$eliminar->ctrEliminarCategoria();

?>