<?php
$categorias = ControladorProductos::ctrMostrarCategorias();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Producto</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del producto</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="nombre_producto" class="form-control"
                            placeholder="Ingrese el nombre del producto" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <input type="number" min="0" step="0.01" name="precio_producto" class="form-control"
                            placeholder="Ingrese el precio" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stock</label>
                        <input type="number" min="0" step="0.01" name="stock_producto" class="form-control"
                            placeholder="Ingrese un stock" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Estado</label>
                        <select name="estado_producto" id="" class="form-control">
                            <option value="">Seleccione un estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Categoria</label>
                        <select class="form-control" name="id_categoria" id="" required>

                            <option value="">Seleccione una categoria</option>

                            <?php
                            foreach ($categorias as $categoria) {
                                ?>
                                <option value="<?php echo $categoria["id_categoria"]; ?>">
                                    <?php echo $categoria["nombre_categoria"]; ?>
                                </option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagen_producto">Imagen</label>
                        <div class="custom-file">
                            <label for="exampleInputEmail1" class="custom-file-label">Subir una imagen</label>
                            <input type="file" name="imagen_producto" id="imagen_producto" class="custom-file-input"
                                accept="image/jpeg, image/png" required>
                        </div>
                        <img class="previsualizarLogo" id="previsualizarLogo" src="" alt="Previsualización de la imagen"
                            style="margin-top: 50px; margin-left: 25px; max-width: 250px; max-height: 250px;">

                    </div>
                </div>
                <!-- /.card-body -->

                <?php

                $agregar = new ControladorProductos();
                $agregar->ctrAgregarProducto();

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