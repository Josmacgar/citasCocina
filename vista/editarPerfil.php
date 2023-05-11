<?php
// incluir header
include("header.php");
include("../controlador/controladorRegistroNoticia.php");

$datos = $entityManager->getRepository("usuario")
    ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));
$fecha = $datos->getFecha_nac();
$fecha_str = $fecha->format('d/m/Y');

?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <title>EditarPerfil</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/editarPerfil.css">

</head>

<body>
    <section class="vh-100" style="background-color: #f4f5f7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-6 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="" alt="" class="img-fluid my-5" style="width: 80px;" />
                                <h5><?php echo  $datos->getNombre(); ?></h5>
                                <a style="color:white" href="/citascocina/vista/registroUsuario.php?modo=editar"><i class="far fa-edit mb-5"></i></a>

                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Información</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted"><?php echo  $datos->getEmail(); ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Telefono</h6>
                                            <p class="text-muted"><?php echo  $datos->getTelefono(); ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Fecha</h6>
                                            <p class="text-muted"><?php echo  $fecha_str; ?></p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Toral Reservas</h6>
                                            <p class="text-muted">Total</p>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-start">
                                        <a href="https://es-es.facebook.com/" target="_blank"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="https://twitter.com/?lang=es" target="_blank"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/citascocina/vista/js/validarNoticia.js"></script>
    <script src="/citascocina/vista/js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>