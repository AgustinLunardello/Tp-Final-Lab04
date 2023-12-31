<?php
$estados_civiles = ControladorClientes::ctrMostrarEstadosCiviles();
if ($_SESSION["tipo_usuario"] != 1) {
    echo '<script>
    window.location = "clientes";
    </script>';
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar cliente</h1>
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
                        <input type="text" name="nombre_cliente" class="form-control" placeholder="Ingrese el nombre"
                            required>
                        <div class="invalid-tooltip">
                            Por favor ingrese un nombre.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" name="apellido_cliente" class="form-control"
                            placeholder="Ingrese el apellido" required>
                        <div class="invalid-tooltip">
                            Por favor ingrese un apellido.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email_cliente" class="form-control" placeholder="Ingrese un email"
                            required>
                        <div class="invalid-tooltip">
                            Por favor ingrese un correo.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="text" name="dni_cliente" class="form-control" placeholder="Ingrese el DNI"
                            required>
                        <div class="invalid-tooltip">
                            Por favor ingrese un DNI.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" required>
                        <div class="invalid-tooltip">
                            Por favor ingrese una fecha de nacimiento.
                        </div>
                    </div>

                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Estado Civil</label>
                        <select class="form-control" name="id_estado_civil" id="" required>

                            <option value="">Seleccione un estado civil</option>

                            <?php
                            foreach ($estados_civiles as $estado_civil) {
                                ?>
                                <option value="<?php echo $estado_civil["id_estado_civil"]; ?>">
                                    <?php echo $estado_civil["nombre_estado_civil"]; ?>
                                </option>

                            <?php } ?>


                        </select>
                        <div class="invalid-tooltip">
                            Seleccione un estado civil
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <?php

                $agregar = new ControladorClientes();
                $agregar->ctrAgregarCliente();

                ?>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->