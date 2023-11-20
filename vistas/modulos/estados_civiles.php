<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Estados Civiles</h1>

                    <a href="agregar_estado_civil" class="btn btn-primary mt-3"><i class="fa-solid fa-user-plus"></i>
                        Agregar Estado Civil</a>

                </div>
            </div>
        </div>

    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped tablaEstadosCiviles">
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

                        $estados_civiles = ControladorEstadoCivil::ctrMostrarEstadosCiviles(null, null);

                        if ($estados_civiles) {
                            foreach ($estados_civiles as $key => $value) {
                                $fecha_formateada = funciones::formatearFecha($value["fecha_creacion"]);
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $value["nombre_estado_civil"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $value["descripcion_estado_civl"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $fecha_formateada; ?>
                                    </td>

                                    <td>
                                        <a href="index.php?pagina=editar_estado_civil&estado_civil=<?php echo $value["id_estado_civil"]; ?>"
                                            class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button id_estado_civil=<?php echo $value["id_estado_civil"]; ?> type="button"
                                            class="btn btn-danger btnEliminarEstadoCivil">
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
    $(".tablaEstadosCiviles tbody").on("click", ".btnEliminarEstadoCivil", function () {
        let id_estado_civil = $(this).attr("id_estado_civil");

        swal
            .fire({
                title: "¿Está seguro de borrar este estado civil?",
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
                        "index.php?pagina=estados_civiles&id_estado_civil=" + id_estado_civil;
                }
            });
    });
</script>
<?php

$eliminar = new ControladorEstadoCivil();
$eliminar->ctrEliminarEstadoCivil();

?>