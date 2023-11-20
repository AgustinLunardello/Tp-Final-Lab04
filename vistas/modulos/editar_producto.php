<?php

$categorias = ControladorProductos::ctrMostrarCategorias();

$producto = ControladorProductos::ctrMostrarProductos("id_producto", $_GET["producto"]);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Producto</h1>
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
                        <input type="text" name="nombre_producto" value="<?php echo $producto["nombre_producto"]; ?>"
                            class="form-control" placeholder="Ingrese el nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <input type="number" min="0" step="0.01" name="precio_producto" value="<?php echo $producto["precio_producto"]; ?>"
                            class="form-control" placeholder="Ingrese el precio del producto" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stock</label>
                        <input type="number" min="0" step="0.01" name="stock_producto" value="<?php echo $producto["stock_producto"]; ?>"
                            class="form-control" placeholder="Ingrese el stock" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Categoria</label>
                        <select class="form-control" name="id_categoria" id="" required>
                            <?php
                            foreach ($categorias as $categoria) {
                                ?>
                                <option <?php if ($producto["id_categoria"] == $categoria["id_categoria"]) { ?> selected <?php } ?>
                                    value="<?php echo $categoria["id_categoria"]; ?>">
                                    <?php echo $categoria["nombre_categoria"]; ?>
                                </option>

                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Estado</label>
                        <select name="estado_producto" id="" class="form-control" required>
                            <option <?php if ($producto['estado_producto'] == 1){ ?> selected<?php }?> value ="1">
                            Activo
                            </option>
                            <option <?php if ($producto['estado_producto'] == 0){ ?> selected<?php }?> value ="0">
                            Inactivo
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="imagen_producto">Imagen</label>
                        <div class="custom-file">
                            <label for="exampleInputEmail1" class="custom-file-label">Subir una imagen</label>
                            <input type="file" name="imagen_producto"
                            id="imagen_producto" class="custom-file-input"
                            accept="image/jpeg, image/png">
                        </div>
                        <img src="<?php echo $producto['imagen_producto'];?>" class="previsualizarLogo" id="previsualizarLogo" alt="Imagen del producto" style="margin-top: 50px; margin-left: 25px; max-width: 250px; max-height: 250px;">
                    </div>

                </div>
                <!-- /.card-body -->

                <?php

                $editar = new ControladorProductos();
                $editar->ctrEditarProducto();

                ?>

                <input type="hidden" name="id_producto" value="<?php echo $_GET["producto"]; ?>">
                <input type="hidden" name="imagen_producto" value="<?php echo $producto['imagen_producto'];?>">

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->