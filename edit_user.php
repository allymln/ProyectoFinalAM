<?php
include("php/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión a la base de datos
    $con = conexion(); 

    // Validar y obtener los datos del formulario
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $razon = mysqli_real_escape_string($con, $_POST['razon']);
    $id = $_POST['id']; // Agrega esta línea para obtener el ID del formulario

    // Realiza la consulta SQL para actualizar el registro con el ID específico
    $sql = "UPDATE usuarios SET razon = '$razon' WHERE id = $id";

    // Ejecuta la consulta
    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: agenda.php");
        exit();
    } else {
        // Ocurrió un error al actualizar los datos
        echo "Error al actualizar los datos: " . mysqli_error($con);
    }
}
?>