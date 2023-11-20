<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link elevation-4">
        <span class="brand-text font-weight-light mx-auto">PHP – Trabajo final
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block">
                    <?php echo $_SESSION['nombre_usuario'] . " " . $_SESSION['apellido_usuario']; ?>
                </a>
                <div class="mt-3"> <!-- Este div envuelve el botón de cierre de sesión -->
                    <a href="salir" class="btn btn-danger btn-sm">
                        <i class="fas fa-sign-out-alt"></i><span class="text-white m-2">Cerrar Sesión</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="usuarios" class="nav-link">
                        <i class="nav-icon  fa-solid fa-users"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tipos_usuarios" class="nav-link">
                        <i class="nav-icon   fa-solid fa-user-gear"></i>
                        <p>
                            Tipo de Usuario
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="clientes" class="nav-link">
                        <i class="nav-icon  fa-solid fa-user-tag"></i>
                        <p>
                            Clientes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="estados_civiles" class="nav-link">
                        <i class="nav-icon  fa-solid fa-person"></i>
                        <p>
                            Estado Civil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="productos" class="nav-link">
                        <i class="nav-icon  fa-solid fa-box-open"></i>
                        <p>
                            Productos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="categorias" class="nav-link">
                        <i class="nav-icon  fa-solid fa-tags"></i>
                        <p>
                            Categorias
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>