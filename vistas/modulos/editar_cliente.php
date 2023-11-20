<?php
if ($_SESSION["tipo_usuario"] != 1) {
    echo '<script>
    window.location = "clientes";
    </script>';
}

$estados_civiles = ControladorClientes::ctrMostrarEstadosCiviles();

$cliente = ControladorClientes::ctrMostrarClientes("id_cliente", $_GET["cliente"]);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar cliente</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del cliente</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" class="needs-validation" novalidate>
                <div class="card-body">
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="nombre_cliente" value="<?php echo $cliente["nombre_cliente"]; ?>"
                            class="form-control" placeholder="Ingrese el nombre" required>
                            <div class="invalid-tooltip">
                            Por favor ingrese un nombre.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" name="apellido_cliente" value="<?php echo $cliente["apellido_cliente"]; ?>"
                            class="form-control" placeholder="Ingrese el apellido" required>
                            <div class="invalid-tooltip">
                            Por favor ingrese un apellido.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email_cliente" value="<?php echo $cliente["email_cliente"]; ?>"
                            class="form-control" placeholder="Ingrese un email" required>
                            <div class="invalid-tooltip">
                            Por favor ingrese un correo.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="number" min="0" name="dni_cliente" value="<?php echo $cliente["dni_cliente"]; ?>"
                            class="form-control" placeholder="Ingrese un dni" required>
                            <div class="invalid-tooltip">
                            Por favor ingrese un DNI.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Fecha Nacimiento</label>
                        <input type="date"  name="fecha_nacimiento" value="<?php echo $cliente["fecha_nacimiento"]; ?>"
                            class="form-control" placeholder="" required>
                            <div class="invalid-tooltip">
                            Por favor ingrese una fecha de nacimiento.
                        </div>
                    </div>

                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Estado Civil</label>
                        <select class="form-control" name="id_estado_civil" id="" required>

                            <?php
                            foreach ($estados_civiles as $estado_civil) {
                                ?>
                                <option <?php if ($cliente["id_estado_civil"] == $estado_civil["id_estado_civil"]) { ?> selected <?php } ?>
                                    value="<?php echo $estado_civil["id_estado_civil"]; ?>">
                                    <?php echo $estado_civil["nombre_estado_civil"]; ?>
                                </option>

                            <?php } ?>

                        </select>
                        <div class="invalid-tooltip">
                            Selecione un estado civil.
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <input type="hidden" name="id_cliente" value="<?php echo $_GET["cliente"]; ?>">

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                <?php
                $editar = new ControladorClientes();
                $editar->ctrEditarCliente();
                ?>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->