<?php include("php/conexion.php"); 

// Primero, realizamos la conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "usuarios"; // Reemplaza esto con el nombre de tu base de datos
$conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Realiza la consulta SQL para obtener los usuarios registrados
$sql = "SELECT id, email , contraseña , razon FROM usuarios";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos_copy.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>proyecto</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary minavbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.html">
              <img src="img/milogo.png" alt="" width="250px">
              </a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inicio.html">
                        <button class="lista-navbar">Inicio</button>
                    </a>
                 </li>
                  <li class="nav-item">
                    <a class="nav-link" href="servicios.html">
                        <button class="lista-navbar">Servicios</button>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="agenda.php">
                        <button class="lista-navbar">Agenda tu cita</button>
                    </a>
                  </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" name="logoutbtn" href="login.php">Logout</a>
                  </li>
              </ul>
              </div>
            </div>
          </nav>
    </header>
<section>
      
<div class="container users-form">
    <h1>Agendar cita</h1>
    <br>
    <form action="insert_user.php" method="POST">
        
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>

        <br>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="Razon" name="razon" required>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-success">Agregar</button>
    </form>
</div>
<br>
<br>
<div class="container users-table">
    <h2>Citas registradas!</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Email</th>
                
                <th>Razon</th>
                <th></th>
                <th></th>
            </tr> 
        </thead>
        <tbody>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['razon'] ?></td>
                    <td><a class="users-table--edit" href="update.php?id=<?= $row['id'] ?>">Editar</a></td>
                    <td><a class="users-table--delete" href="delete_user.php?id=<?= $row['id'] ?>">Eliminar</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</section>
          </table>
      </div>
    </section>

    <!-- Footer -->
    <footer class="pie-pagina">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <figure>
                        <a href="#">
                            <img src="img/milogo.png" alt="logo" width="150px">
                        </a>
                    </figure>
                </div>
                <div class="col-md-4">
                    <h2>Contáctanos</h2>
                    <p><i class="fa fa-envelope"></i> Email: contacto@tudominio.com</p>
                    <p><i class="fa fa-phone"></i> Teléfono: +123 456 789</p>
                </div>
                <div class="col-md-4">
                    <div class="red-social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-youtube"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2023 <b>AMolano</b> - Todos Los Derechos Reservados</small>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
