<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head></head>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="/citascocina/vista/css/estilos.css">


</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/citascocina/index.php"><i>citasCocina</i> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/citascocina/index.php">Inicio</a></li>
                    <?php
                    //se muestra Reservas cuando existe una sesion
                    if (isset($_SESSION['email'])) {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"/citascocina/vista/reservas.php\">Reservas</a></li>";
                    }
                    ?>

                    <?php
                    //se muestra login cuando no existe una sesion
                    if (!isset($_SESSION['email'])) {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"/citascocina/vista/Login.php\">Login</a></li>";
                    }
                    ?>
                    <li class="nav-item"><a class="nav-link" href="/citascocina/vista/noticias.php">Noticias</a></li>
                    <li class="nav-item"><a class="nav-link" href="/citascocina/vista/mensajes.php">Mensajes</a></li>
                    <?php
                    //se muestra cerrar sesion solo cuando existe una sesion
                    if (isset($_SESSION['email'])) {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"/citascocina/controlador/cerrarSesion.php\">Cerrar Sesion</a></li>";
                    }
                    ?>
                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="btn  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-gear text-white"></i>
                            </button>
                            <ul class="dropdown-menu text-small">
                                <?php
                                //se muestra el nombre cuando exista una sesion
                                if (isset($_SESSION['email'])) {
                                    $nombre = $_SESSION["nombre"];
                                    echo "<li><a class=\"dropdown-item\" >$nombre</a></li>";
                                    echo "<li><a class=\"dropdown-item\" href=\"/citascocina/vista/editarPerfil.php\">Perfil</a></li>";
                                }
                                ?>

                                <?php
                                //if que muestra el icono listar usuario solo cuando el usuario de la sesion es profesor o admin
                                if (isset($_SESSION['idUsuario'])) {
                                    if ($_SESSION['rol']=='admin') {
                                        echo "<li><a class=\"dropdown-item\" href=\"/citascocina/vista/listarUsuarios.php\">Usuarios</a></li>";
                                    }
                                }
                                ?>
                                <li><a class="dropdown-item" href="/citascocina/vista/platos.php">Platos</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">nose</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <script src="validarLogin.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>