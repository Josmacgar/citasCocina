<?php
// incluir header
include("header.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Noticias.php");
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
    <title>Noticias</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="/citascocina/vista/js/alertify/css/alertify.css">
    <script src="/citascocina/vista/js/alertify/alertify.js"></script>

</head>

<body>
    <?php
    //if que muestra el icono de añadir noticias solo cuando el usuario de la sesion es profesor
        if(isset($_SESSION['idUsuario'])){
            //obtenemos el usuario de la sesion
            $resultado = $entityManager->getRepository("usuario")
            ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));

            //comprobamos que el rol de la sesion sea profesor
            if ($resultado->getRol()=='profesor'||$resultado->getRol()=='admin') {
                echo" <p id=\"botonAniadir\"><a href=\"/citascocina/vista/registroNoticias.php\"><img id=\"imagenAniadir\" src=\"/citascocina/vista/img/plus-circle.svg\"></a></p>";
            }
        }
    ?>

    <div id="tarjetas">
        <?php
        $resultado = $entityManager->getRepository("noticias")
            ->findAll();
        foreach ($resultado as $key) {
        ?>

            <?php
            $id = $key->getIdNoticia();
            $titulo = $key->getTitulo();
            $cuerpo = $key->getCuerpo();
            $fecha = $key->getFecha();
            $fecha_str = $fecha->format('d/m/Y');
            ?>
            <div class="card ajustar">
                <h3 class="card-img-top" style="margin-left: 2%;"><?php echo $key->getTitulo() ?></h3>
                <div class="card-body">
                    <p class="card-text presentacion"><?php echo $key->getCuerpo() ?></p>
                    <p class="card-text presentacion"><i><?php echo $fecha_str ?></i></p>
                    <a class="btn btn-primary" data-bs-toggle="modal" href="#portfolioModal1" onclick="verNoticia('<?php echo $titulo ?>', '<?php echo $cuerpo ?>', '<?php echo $fecha_str ?>')">
                        Ver
                    </a>
                    <?php
                    //solo se puede eliminar noticias si es profesor o admin
                    if (isset($_SESSION['idUsuario'])) {
                       if ($_SESSION['rol']=='profesor'||$_SESSION['rol']=='admin') {
                       echo " <a class=\"btn btn-danger\"  onclick=\"if(confirm('¿Estás seguro de que deseas eliminar esta noticia?')){EliminarNoticia('" . $id . "')}\">Eliminar</a>";
                       echo " <a class=\"btn btn-warning\" href=\"/citascocina/vista/registroNoticias.php?modo=editar&idNoticia=$id\">Editar</a>";
                       }
                    }
                    ?>
                </div>
            </div>

            <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-bs-dismiss="modal"><img src="/citascocina/vista/assets/img/close-icon.svg" alt="Close modal" /></div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="modal-body">
                                        <!-- Project details-->
                                        <h2 class="text-uppercase" id="idTitulo"></h2>
                                        <p id="idCuerpo"></p>
                                        <ul class="list-inline">
                                            <li>
                                                <strong>Fecha:</strong>
                                                <label id="idFecha"></label>
                                            </li>
                                        </ul>
                                        <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                            <i class="fas fa-xmark me-1"></i>
                                            Cerrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <script src="/citascocina/vista/js/verNoticia.js"></script>
    <script src="/citascocina/vista/js/eliminarNoticias.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/citascocina/vista/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>