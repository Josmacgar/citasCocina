<?php
// incluir header
include("header.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Reservas.php");
include("../modelo/Doctrine/Entity/Platos.php");
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
    <div id="contenedor">
        <?php
        //if que muestra el icono de añadir noticias solo cuando el usuario de la sesion es profesor
        if (isset($_SESSION['idUsuario'])) {
            //comprobamos que el rol de la sesion sea profesor
            if ($_SESSION['rol'] == 'profesor' || $_SESSION['rol'] == 'admin') {
                echo " <p id=\"botonAniadir\"><a href=\"/citascocina/vista/registroReservas.php\"><img id=\"imagenAniadir\" src=\"/citascocina/vista/img/plus-circle.svg\"></a></p>";
            }
        }
        ?>

        <div id="tarjetas">
            <?php
            $resultado = $entityManager->getRepository("reservas")
                ->findAll();
            foreach ($resultado as $key) {

                $platos = $entityManager->getRepository("platos")
                ->findPLatos($key->getIdReserva());
                //obtenemos solo el dato que queremos 
                $nombrePlato = array_column($platos, 'nombre');
                $tipoPlato = array_column($platos, 'tipo');
                $imagen = array_column($platos, 'imagen');

                //convertimos los datos anteriores a cadena de texto
                $convertNombre= implode(',',$nombrePlato);
                $convertTipo= implode(',',$tipoPlato);
                $convertImagen= implode(',',$imagen);
                // print($convertImagen);

            ?>

                <?php
                $id = $key->getIdReserva();
                $comensales = $key->getComensales();
                $precio = $key->getPrecio();
                $fecha = $key->getFecha();
                $fecha_str = $fecha->format('d/m/Y');
                ?>
                <div class="card ajustar">
                    <h3 class="card-img-top" style="margin-left: 2%;"><?php echo $fecha_str ?></h3>
                    <div class="card-body">
                        <p class="card-text presentacion">Comensales: <?php echo $comensales ?></p>
                        <p class="card-text presentacion">Precio: <i><?php echo $precio ?> €</i></p>
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#portfolioModal1" onclick="verReserva('<?php echo $comensales ?>', '<?php echo $precio ?>', '<?php echo $fecha_str ?>', '<?php echo $convertNombre ?>', '<?php echo $convertTipo ?>', '<?php echo $convertImagen ?>')">
                            Ver
                        </a>
                        <?php
                        //solo se puede eliminar noticias si es profesor o admin
                        if (isset($_SESSION['idUsuario'])) {
                            if ($_SESSION['rol'] == 'profesor' || $_SESSION['rol'] == 'admin') {
                                echo " <a class=\"btn btn-warning\" href=\"/citascocina/vista/registroNoticias.php?modo=editar&idNoticia=$id\">Editar</a>";
                                echo " <a data-id=\"$id\" class=\"eliminarNoticia btn btn-danger\">Eliminar</a>";
                            }
                        }
                        // print_r($idPlato);
                        ?>
                    </div>
                </div>

                <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal" id="cerrarModal"><img src="/citascocina/vista/assets/img/close-icon.svg" alt="Close modal" /></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase" id="idFecha"></h2>
                                            <p id=""></p>
                                            <ul class="list-inline">
                                                <li>
                                                    <strong>Comensales:</strong>
                                                    <label id="idComensales"></label>
                                                    <br>
                                                    <strong>Precio:</strong>
                                                    <label id="idPrecio"></label>
                                                </li>
                                            </ul>
                                            <h3 class="text-uppercase">Menú</h3>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Tipo</th>
                                                        <th scope="col">Imagen</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="crear">

                                                </tbody>
                                            </table>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <!-- <i class="fas fa-xmark me-1"></i> -->
                                                Inscribirse
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
    </div>

    <!-- Bootstrap core JS-->
    <!-- Core theme JS-->
    <script src="/citascocina/vista/js/scripts.js"></script>
    <script src="/citascocina/vista/js/verReservas.js"></script>
    <script src="/citascocina/vista/js/eliminarReservas.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>