<?php
include("php/conexion.php");

// Verifica si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión a la base de datos
    $con = conexion();

    // Validar y obtener los datos del formulario
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $contrasena = mysqli_real_escape_string($con, $_POST['contraseña']);
    $razon = mysqli_real_escape_string($con, $_POST['razon']);

    // Realiza la consulta SQL para insertar un nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (email, contraseña, razon) VALUES ('$email', '$contrasena', '$razon')";

    // Ejecuta la consulta
    $query = mysqli_query($con, $sql);

    if ($query) {
        // Los datos se insertaron correctamente, redirige a la página principal u otra página deseada
        header("Location: agenda.php");
        exit();
    } else {
        // Ocurrió un error al insertar los datos
        echo "Error al insertar los datos: " . mysqli_error($con);
    }
}
?>