<?php
session_start(); // Inicia la sesión

require("php/conexion.php");

function verificarCredenciales($email, $contrasena, $conexion) {
    $email = $conexion->real_escape_string($email);

    $sql = "SELECT email, contraseña FROM usuarios WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $contrasenaGuardada = $fila["contraseña"];

        // Comparar contraseñas sin cifrar
        if ($contrasena === $contrasenaGuardada) {
            return true;
        }
    }

    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    if (verificarCredenciales($email, $contrasena, $conexion)) {
        $_SESSION["usuario"] = $email;
        header("Location: index.html");
        exit();
    } else {
        $_SESSION["mensaje"] = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <img src="img/logo/milogo.png" alt="Logo de la empresa" class="logo">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="login-container">
                    <h2 class="text-center">Iniciar Sesión</h2>
                    <form class="login-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Correo Electrónico" required pattern="[^@\s]+@[^@\s]+\.[a-zA-Z]{2,}" title="Ingrese una dirección de correo válida">
                        </div>
                        <div class="form-group">
                            <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </form>
                    <div class="register mt-3">
                        <a href="register.php">¿No te has registrado? Regístrate.</a>
                    </div>
                    <div class="message">
                        <?php
                        if (isset($_SESSION["mensaje"])) {
                            echo $_SESSION["mensaje"];
                            unset($_SESSION["mensaje"]);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
