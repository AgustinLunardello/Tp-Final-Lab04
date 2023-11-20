<?php
require_once 'controladores/plantilla.controlador.php';

require_once 'modelos/funciones.php';

require_once 'controladores/usuarios.controlador.php';
require_once 'modelos/usuarios.modelo.php';

require_once 'controladores/tipo_usuario.controlador.php';
require_once 'modelos/tipo_usuario.modelo.php';

require_once 'controladores/clientes.controlador.php';
require_once 'modelos/clientes.modelo.php';

require_once 'controladores/estado_civil.controlador.php';
require_once 'modelos/estado_civil.modelo.php';

require_once 'controladores/categorias.controlador.php';
require_once 'modelos/categorias.modelo.php';

require_once 'controladores/productos.controlador.php';
require_once 'modelos/productos.modelo.php';

$vista = new ControladorPlantilla();
$vista->ctrMostrarPlantilla();

?>