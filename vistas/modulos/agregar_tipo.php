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
            <form method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre del Tipo de Usuario</label>
                        <input type="text" name="nombre_tipo_usuario" class="form-control"
                            placeholder="Ingrese el nombre del nuevo tipo" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="text" name="descripcion_tipo_usuario" class="form-control"
                            placeholder="Ingrese una descripcion" required>
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