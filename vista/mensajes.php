<?php
// incluir header
include("header.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Mensajes.php");
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
        <p id="botonAniadir">
            <button type="button" class="btn btn-secondary" id="imagenAniadir" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Redactar</button>
        </p>
        <?php
        //contador que se va incrementando por cada fila 
        $contador = 1;
        $datos = $entityManager->getRepository("mensajes")
            ->findBy(array('destinatario' => $_SESSION['idUsuario']));
        if (count($datos) > 0) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">De:</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Cuerpo</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <?php
                foreach ($datos as $key) {
                    //formato de fecha
                    $fecha = $key->getFecha();
                    $fecha_str = $fecha->format('d/m/Y');
                ?>
                    <tbody class="tbodyMensajes">
                        <tr data-bs-toggle="modal" data-bs-target="#verMensaje" onclick="verMensaje('<?php echo $key->getUsuario()->getEmail() ?>','<?php echo $key->getAsunto() ?>','<?php echo $key->getCuerpo() ?>','<?php echo $fecha_str ?>')">
                            <th scope="row"><?php echo $contador ?></th>
                            <td><?php echo $key->getUsuario()->getEmail() ?></td>
                            <td><?php echo $key->getAsunto() ?></td>
                            <td id="cuerpo"><?php echo $key->getCuerpo() ?></td>
                            <td><?php echo $fecha_str ?></td>

                        </tr>
                    </tbody>
                <?php
                    $contador += 1;
                }
                ?>
            </table>
        <?php
        } else {
            echo '<section class="m-auto d-flex justify-content-center"><p class="display-6">No existen Mensajes</p></section>';
        }
        ?>
        <!-- Modal ver mensaje-->
        <div class="modal fade" id="verMensaje" tabindex="-1" aria-labelledby="verMensaje" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="titulo"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list-inline">
                            <li>
                                <strong>De:</strong>
                                <label id="remitente"></label>
                                <br>
                                <strong>Fecha:</strong>
                                <label id="idFecha"></label>
                            </li>
                        </ul>
                        <div class="text-break">
                            <strong>Contenido:</strong>
                            <p id="contenido"></p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal enviar mensaje -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Mensaje</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formulario" action="/citascocina/controlador/controladorMensajes.php" method="post">
                            <div class="mb-3">
                                <label for="destinatario" class="col-form-label">Destinatario:</label>
                                <input type="text" class="form-control" id="destinatario" name="destinatario">
                                <div id="resultadoBusqueda"></div>
                            </div>
                            <div class="mb-3">
                                <label for="asunto" class="col-form-label">Asunto:</label>
                                <input type="text" class="form-control" id="asunto" name="asunto">
                            </div>
                            <div class="mb-3">
                                <label for="contenido" class="col-form-label">Mensaje:</label>
                                <textarea class="form-control" id="contenido" name="contenido"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="enviar">Send message</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <!-- Core theme JS-->
    <script src="/citascocina/vista/js/scripts.js"></script>
    <script src="/citascocina/vista/js/mensajes.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>