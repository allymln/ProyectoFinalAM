<?php
include("php/conexion.php");
$conexion = conexion();
$id = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id = '$id'"; 
$query = mysqli_query($conexion, $sql);
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_copy.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #ffd1dc; 
        }
        .user-form {
            background-color: #fff; 
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
    <title>Editar razon de cita</title>
</head>
<body>
<div class="container">
    <div class="users-form">
        <form action="edit_user.php" method="POST">
            <br>
            <h1>Editar Usuario</h1>
            <input type="hidden" name="id" value="<?= $row['id']?>">
            <div class="form-group">
        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $row['email'] ?>" readonly>
            </div>  
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="razon" placeholder="Razon" value="<?= $row['razon']?>" style="font-weight: bold;">
            </div>
            <div class="text-center mt-3">
                <input type="submit" class="btn btn-primary" value="Actualizar información">
            </div>
        </form>
    </div>
</div>
</body>
</html>