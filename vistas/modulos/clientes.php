<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Clientes</h1>
                    <?php
                    if ($_SESSION['tipo_usuario'] == 1) {
                        ?>
                        <a href="agregar_cliente" class="btn btn-primary mt-3"><i class="fa-solid fa-user-plus"></i> Agregar
                            cliente</a>
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
                <table id="example1" class="table table-bordered table-striped tablaClientes">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Edad</th>
                            <th>Fecha de Creacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $clientes = ControladorClientes::ctrMostrarClientes(null, null);

                        if ($clientes) {
                            foreach ($clientes as $key => $value) {
                                $fecha_formateada = funciones::formatearFecha($value["fecha_creacion"]);
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $value["nombre_cliente"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $value["apellido_cliente"]; ?>
                                    </td>

                                    <td>
                                        <?php echo $value["dni_cliente"]; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $edad = ControladorClientes::ctrCalcularEdad($value['fecha_nacimiento'], $value['id_cliente']);
                                        echo $edad;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $fecha_formateada; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($_SESSION['tipo_usuario'] == 1) {
                                            ?>
                                            <a href="index.php?pagina=editar_cliente&cliente=<?php echo $value["id_cliente"]; ?>"
                                                class="btn btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button id_cliente=<?php echo $value["id_cliente"]; ?> type="button"
                                                class="btn btn-danger btnEliminarCliente">
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

                    </tbody>
                </table>
            </div>

        </div>

    </section>
</div>
<script>
    $(".tablaClientes tbody").on("click", ".btnEliminarCliente", function () {
        let id_cliente = $(this).attr("id_cliente");

        swal
            .fire({
                title: "¿Está seguro de borrar este cliente?",
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
                        "index.php?pagina=clientes&id_cliente=" + id_cliente;
                }
            });
    });
</script>
<?php

$eliminar = new ControladorClientes();
$eliminar->ctrEliminarCliente();

?>