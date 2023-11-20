# Trabajo Final Laboratorio 04

### Temas: PHP – Trabajo final

#### Esta version es para el localhost

- **correo:** admin@admin.com
- **password:** 12345

Se creará un panel de control completo:
Módulos

- **Usuarios**
- **Tipos de Usuario**
- **Clientes**
- **Estado civil**
- **Productos**
- **Categorías**
- **Login**

**Usuarios:** Nombre, Apellido, Email, Tipo de usuario, Password, Estado, fecha de
creación, fecha ultimo ingreso.

Todos los campos deberán ser validados del lado del cliente con sus respectivos mensajes, del lado del servidor: nombre apellido, email.

Validar no repetir email.

Deberán tener mínimo un súper administrador de nivel 1, los demás usuarios serán a elección, no se podrá eliminar ningún administrador.

Se podrá cambiar el estado de activo a inactivo, y viceversa, solo si no es un súper administrador (usuarios que no tengan un nivel 1).

Un usuario que no es nivel 1, no podrá hacer ABM de NINGÚN MODULO, solo C.

**Tipos de Usuario:** Nombre, fecha de creación.

Inicialmente se creará el súper administrador que tendrá el id 1.

Validar del lado del cliente.

Validar no repetir tipo de usuario.

**Clientes:** Nombre, Apellido, Email, DNI, fecha de nacimiento, estado civil, fecha de
creación.

En la tabla de clientes deberá mostrarse: Nombre, Apellido, DNI, Acciones.

Todos los campos deberán ser validados del lado del cliente con sus respectivos mensajes.

Se debe validar no ingresar mismo email y/o mismo DNI (DNI solo números).

Mostrar edad (Año actual – año de nacimiento).

**Estado civil:** Nombre, fecha de creación.

Validar del lado del cliente.

Validar no repetir estado civil.

**Productos:** Nombre, categoría, Precio, Imagen, Estado, Stock, Imagen, fecha de creación.

En la tabla de productos se deberá ver: Nombre, Categoría, Estado, Acciones.

Deberán tener un botón para ver más detalles en una ventana modal, con toda la información del producto.

En editar se podrá cambiar el estado: activo o inactivo.

Validar del lado del cliente todos los tipos de datos.

Validar no repetir productos.

**Categorías:** Nombre, fecha de creación.

Validar del lado del cliente.

Validar no repetir categoría.

Mostrar en todas las tablas la fecha de creación con formato dd/mm/aaaa, usar una función pasándole el parámetro del día que se trae de la BD.

Las funciones deberán estar en un archivo funciones.php, dentro de la carpeta modelos, usar una clase ejemplo:

```php
ClassFunciones->mostrarFecha();
```

**Pautas: seguir el estándar visto en clase: MVC, Clases, Métodos
Cada clase, método, controlador, modelo, página, archivo js, etc, deberán tener nombre correspondiente en alguna parte: ControladorProductos,mdlEditarProducto, productos js, etc.**

**Formato de entrega: deberán enviar al campus el archivo rar y su abse de
datos, además debe poder verse en línea, decidirá cada grupo si usa el
servidor de la Universidad o se le provee uno.
El sistema se deberá exhibir en la última clase, mostrarán lo programado
en uso y cada alumno expondrá que parte del sistema realizó**
