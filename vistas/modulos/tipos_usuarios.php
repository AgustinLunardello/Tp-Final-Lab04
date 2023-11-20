<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tipos de Usuarios</h1>

                    <a href="agregar_tipo" class="btn btn-primary mt-3"><i class="fa-solid fa-user-plus"></i> Agregar
                        Tipo</a>

                </div>
            </div>
        </div>

    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped tablaTiposUsuarios">
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

                        $tipos_usuarios = ControladorTipos::ctrMostrarTipos(null, null);

                        if ($tipos_usuarios) {
                            foreach ($tipos_usuarios as $key => $value) {
                                $fecha_formateada = funciones::formatearFecha($value["fecha_creacion"]);
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $value["nombre_tipo_usuario"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $value["descripcion_tipo_usuario"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $fecha_formateada; ?>
                                    </td>

                                    <td>
                                        <a href="index.php?pagina=editar_tipo&tipo_usuario=<?php echo $value["id_tipo_usuario"]; ?>"
                                            class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button id_tipo_usuario=<?php echo $value["id_tipo_usuario"]; ?> type="button"
                                            class="btn btn-danger btnEliminarTipoUsuario">
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
    $(".tablaTiposUsuarios tbody").on("click", ".btnEliminarTipoUsuario", function () {
        let id_tipo_usuario = $(this).attr("id_tipo_usuario");

        swal
            .fire({
                title: "¿Está seguro de borrar este tipo de usuario?",
                text: "¡Si no lo está puede cancelar la accíón!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Si, borrar tipo de usuario!",
            })
            .then(function (result) {
                if (result.value) {
                    window.location =
                        "index.php?pagina=tipos_usuarios&id_tipo_usuario=" + id_tipo_usuario;
                }
            });
    });
</script>
<?php

$eliminar = new ControladorTipos();
$eliminar->ctrEliminarTipoUsuario();

?>