<?php
if ($_SESSION["tipo_usuario"] != 1) {
    echo '<script>
    window.location = "tipos_usuarios";
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
                    <h1>Agregar tipo de usuario</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del nuevo tipo usuario</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" class="needs-validation" novalidate>
                <div class="card-body">
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Nombre del Tipo de Usuario</label>
                        <input type="text" name="nombre_tipo_usuario" class="form-control"
                            placeholder="Ingrese el nombre del nuevo tipo" required>
                        <div class="invalid-tooltip">
                            Por favor ingrese un nombre.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="text" name="descripcion_tipo_usuario" class="form-control"
                            placeholder="Ingrese una descripcion" required>
                        <div class="invalid-tooltip">
                            Por favor ingrese una descripcion.
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <?php

                $agregar = new ControladorTipos();
                $agregar->ctrAgregarTipoUsuario();

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