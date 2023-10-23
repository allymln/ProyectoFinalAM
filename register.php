<!DOCTYPE html>
<html>
<head>
    <title>Regístrate</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <img src="img/milogo.png" alt="Logo de la empresa" class="logo">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="login-container">
                    <h2 class="text-center">Regístrate</h2>
                    <form class="login-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <input type="text" name="emailRegister" class="form-control" placeholder="Correo Electrónico" required pattern="[^@\s]+@[^@\s]+\.[a-zA-Z]{2,}" title="Ingrese una dirección de correo válida">
                        </div>
                        <div class="form-group">
                            <input type="password" name="contrasenaRegister" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="aceContrasenaRegister" class="form-control" placeholder="Confirmar Contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                    </form>
                    <div class="register mt-3">
                        <a href="login.php">¿Ya tienes una cuenta? Inicia sesión.</a>
                    </div>  
                    <div class="message">
                        <?php
                        session_start(); // Inicia la sesión

                        $servidor = "localhost";
                        $usuario = "root";
                        $contrasena = "";
                        $base_de_datos = "usuarios";

                        $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

                        if ($conexion->connect_error) {
                            die("Conexión fallida: " . $conexion->connect_error);
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            global $conexion; // Accede a la variable global $conexion
                            $email = $_POST["emailRegister"];
                            $contrasena = $_POST["contrasenaRegister"];
                            $aceContrasena = $_POST["aceContrasenaRegister"];

                            // Verificar si el correo ya está registrado
                            $sql = "SELECT email FROM usuarios WHERE email = '$email'";
                            $resultado = $conexion->query($sql);

                            if ($resultado->num_rows > 0) {
                                echo "Este correo electrónico ya está registrado.";
                            } elseif ($contrasena != $aceContrasena) {
                                echo "Las contraseñas no coinciden.";
                            } else {
                                $sql = "INSERT INTO usuarios (email, contraseña) VALUES ('$email', '$contrasena')";
                                if ($conexion->query($sql) === true) {
                                    echo "Registro exitoso. Ahora puedes iniciar sesión.";
                                } else {
                                    echo "Error en el registro: " . $conexion->error;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>