<?php
function conexion() {
    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_de_datos = "usuarios";

    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    return $conexion;
}
?>
