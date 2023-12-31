<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                    <?php
                    if ($_SESSION['tipo_usuario'] == 1) {
                        ?>
                        <a href="agregar_usuario" class="btn btn-primary mt-3"><i class="fa-solid fa-user-plus"></i> Agregar
                            usuario</a>
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
                <table id="example1" class="table table-bordered table-striped tablaUsuarios">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Fecha de Creacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $usuarios = ControladorUsuarios::ctrMostrarUsuarios(null, null);

                        if ($usuarios) {
                            foreach ($usuarios as $key => $value) {
                                $fecha_formateada = funciones::formatearFecha($value["fecha_creacion"]);
                                if ($value["estado_usuario"] == 1) {
                                    $estado = "<span class='badge badge-success'>Activo</span>";
                                } else {
                                    $estado = "<span class='badge badge-danger'>Inactivo</span>";
                                }

                                ?>
                                <tr>
                                    <td>
                                        <?php echo $value["nombre_usuario"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $value["apellido_usuario"]; ?>
                                    </td>

                                    <td>
                                        <?php echo $value["nombre_tipo_usuario"]; ?>
                                    </td>

                                    <td>
                                        <?php echo $value["email_usuario"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $estado; ?>
                                    </td>
                                    <td>
                                        <?php echo $fecha_formateada; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($_SESSION['tipo_usuario'] == 1) {
                                            ?>
                                            <a href="index.php?pagina=editar_usuario&usuario=<?php echo $value["id_usuario"]; ?>"
                                                class="btn btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button id_usuario=<?php echo $value["id_usuario"]; ?> type="button"
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
<?php

$eliminar = new ControladorUsuarios();
$eliminar->ctrEliminarUsuario();

?>