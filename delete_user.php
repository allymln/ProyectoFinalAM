<?php
include("php/conexion.php"); 
$conexion = conexion();
$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = '$id'";

$query = mysqli_query($conexion, $sql);

if($query){
    echo "Datos eliminados correctamente";
    header("Location: agenda.php");
}
?>