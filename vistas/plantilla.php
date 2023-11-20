<?php
session_start();
$url = ControladorPlantilla::url();

if (!(isset($_SESSION["iniciarSesion"]))) {
    include 'modulos/login.php';
} else if ($_SESSION['iniciarSesion'] == 'ok') {
    ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Admin</title>
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

            <!-- jQuery -->
            <script src="<?php echo $url; ?>vistas/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="<?php echo $url; ?>vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script src="<?php echo $url; ?>vistas/js/sweet.js"></script>
            <!-- DataTables -->
            <link rel="stylesheet" href="<?php echo $url; ?>vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet"
                href="<?php echo $url; ?>vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="<?php echo $url; ?>vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

            <!-- Theme style -->
            <link rel="stylesheet" href="<?php echo $url; ?>vistas/css/adminlte.min.css">
        </head>

        <body class="hold-transition layout-navbar-fixed control-sidebar-slide-open">
            <!-- Site wrapper -->
            <div class="wrapper">

                <?php

                include 'vistas/modulos/header.php';
                include 'modulos/menu.php';

                if (isset($_GET["pagina"])) {

                    if (
                        $_GET["pagina"] == "usuarios" ||
                        $_GET["pagina"] == "agregar_usuario" ||
                        $_GET["pagina"] == "editar_usuario" ||
                        $_GET["pagina"] == "salir" ||
                        $_GET["pagina"] == "productos" ||
                        $_GET["pagina"] == "agregar_producto" ||
                        $_GET["pagina"] == "editar_producto" ||
                        $_GET["pagina"] == "tipos_usuarios" ||
                        $_GET["pagina"] == "agregar_tipo" ||
                        $_GET["pagina"] == "editar_tipo" ||
                        $_GET["pagina"] == "clientes" ||
                        $_GET["pagina"] == "agregar_cliente" ||
                        $_GET["pagina"] == "editar_cliente" ||
                        $_GET["pagina"] == "estados_civiles" ||
                        $_GET["pagina"] == "agregar_estado_civil" ||
                        $_GET["pagina"] == "editar_estado_civil" ||
                        $_GET["pagina"] == "categorias" ||
                        $_GET["pagina"] == "agregar_categoria" ||
                        $_GET["pagina"] == "editar_categoria" ||
                        $_GET["pagina"] == "home"
                    ) {
                        include 'modulos/' . $_GET["pagina"] . '.php';
                    }
                } else {
                    include 'modulos/home.php';
                }
                include 'modulos/footer.php';

                ?>

            </div>
            <!-- ./wrapper -->


            <script src="<?php echo $url; ?>vistas/js/scripts.js"></script>

            <!-- DataTables  & Plugins -->
            <script src="<?php echo $url; ?>vistas/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/jszip/jszip.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/pdfmake/pdfmake.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/pdfmake/vfs_fonts.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
            <script src="<?php echo $url; ?>vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
            <!-- AdminLTE App -->
            <script src="<?php echo $url; ?>vistas/js/adminlte.min.js"></script>
            <script src="<?php echo $url; ?>vistas/js/validar_imagen.js"></script>
            <script src="<?php echo $url; ?>vistas/js/validar_forms.js"></script>


        </body>

        </html>
<?php } else {
    include 'modulos/login.php';
} ?>