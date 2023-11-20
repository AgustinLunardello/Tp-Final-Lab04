<?php
$estado = ControladorEstadoCivil::ctrMostrarEstadosCiviles("id_estado_civil", $_GET['estado_civil']);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Estado Civil</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del Estado</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" class="needs-validation" novalidate>
                <div class="card-body">
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="nombre_estado_civil"
                            value="<?php echo $estado["nombre_estado_civil"]; ?>" class="form-control" placeholder=""
                            required>
                        <div class="invalid-tooltip">
                            Por favor ingrese un nombre.
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <input type="text" name="descripcion_estado_civl"
                            value="<?php echo $estado["descripcion_estado_civl"]; ?>" class="form-control"
                            placeholder="" required>
                        <div class="invalid-tooltip">
                            Por favor ingrese una descripcion.
                        </div>
                    </div>

                    <input type="hidden" name="id_estado_civil" value="<?php echo $_GET["estado_civil"]; ?>">


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php
                $editar = new ControladorEstadoCivil();
                $editar->ctrEditarEstadoCivil();

                ?>




            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->