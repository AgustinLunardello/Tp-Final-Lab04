<?php
class funciones
{
    static public function generar_url($cadena)
    {
        $cadena = strtolower($cadena);
        $cadena = preg_replace('/[^a-z0-9]+/', '_', $cadena);

        // Eliminar guiones bajos al principio y al final
        $cadena = trim($cadena, '_');

        // Agregar una parte única usando el timestamp actual (time)
        $parte_unica = time();

        // Concatenar la cadena y la parte única
        $url_generada = $cadena . '_' . $parte_unica;

        return $url_generada;
    }
    static public function formatearFecha($fechaDesdeBD)
    {
        // Convertir la fecha de la base de datos a un objeto DateTime
        $fechaObj = new DateTime($fechaDesdeBD);

        // Formatear la fecha en el formato dd/mm/aaaa
        $fechaFormateada = $fechaObj->format('d/m/Y');

        return $fechaFormateada;
    }
}
?>