<?php
$tipos = ControladorUsuarios::ctrMostrarTipos();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar usuario</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos de usuario</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="nombre_usuario" class="form-control" placeholder="Ingrese el nombre"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" name="apellido_usuario" class="form-control"
                            placeholder="Ingrese el apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email_usuario" class="form-control" placeholder="Ingrese un email"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo de usuario</label>
                        <select class="form-control" name="tipo_usuario" id="" required>

                            <option value="">Seleccione un rol</option>

                            <?php
                            foreach ($tipos as $tipo) {
                                ?>
                                <option value="<?php echo $tipo["id_tipo_usuario"]; ?>">
                                    <?php echo $tipo["nombre_tipo_usuario"]; ?>
                                </option>

                            <?php } ?>


                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" name="password_usuario" placeholder="Password"
                            required>
                    </div>

                </div>
                <!-- /.card-body -->

                <?php

                $agregar = new ControladorUsuarios();
                $agregar->ctrAgregarUsuario();

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