<?php
$tipo = ControladorTipos::ctrMostrarTipos("id_tipo_usuario", $_GET['tipo_usuario']);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Tipo usuario</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del tipo usuario</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" class="needs-validation" novalidate>
                <div class="card-body">
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="nombre_tipo_usuario"
                            value="<?php echo $tipo["nombre_tipo_usuario"]; ?>" class="form-control" placeholder=""
                            required>
                        <div class="invalid-tooltip">
                            Por favor ingrese un nombre.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="text" name="descripcion_tipo_usuario"
                            value="<?php echo $tipo["descripcion_tipo_usuario"]; ?>" class="form-control" placeholder=""
                            required>
                        <div class="invalid-tooltip">
                            Por favor ingrese un nombre.
                        </div>
                    </div>

                    <input type="hidden" name="id_tipo_usuario" value="<?php echo $_GET["tipo_usuario"]; ?>">


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php
                $editar = new ControladorTipos();
                $editar->ctrEditarTipoUsuario();

                ?>




            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->