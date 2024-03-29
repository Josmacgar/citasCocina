<?php
// incluir header
include("header.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Reservas.php");
include("../modelo/Doctrine/Entity/Platos.php");
include("../modelo/Doctrine/Entity/Usuario.php");
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
                $convertNombre = implode(',', $nombrePlato);
                $convertTipo = implode(',', $tipoPlato);
                $convertImagen = implode(',', $imagen);
                // print($convertImagen);

            ?>

                <?php
                $id = $key->getIdReserva();
                $comensales = $key->getComensales();
                $precio = $key->getPrecio();
                $fecha = $key->getFecha();
                $fecha_str = $fecha->format('d/m/Y - H:i');
                ?>
                <div class="card ajustar tamanio_reservas">
                    <h3 class="card-img-top" style="margin-left: 2%;"><?php echo $fecha_str ?></h3>
                    <div class="card-body">
                        <p class="card-text presentacion">Comensales: <?php echo $comensales ?></p>
                        <p class="card-text presentacion">Precio: <i><?php echo $precio ?> €</i></p>


                        <a class="btn btn-primary" data-bs-toggle="modal" href="#portfolioModal1" onclick="verReserva('<?php echo $comensales ?>', '<?php echo $precio ?>', '<?php echo $fecha_str ?>', '<?php echo $convertNombre ?>', '<?php echo $convertTipo ?>', '<?php echo $convertImagen ?>')">
                            Ver
                        </a>
                        <?php
                        $prueba = findReservaUsuario($_SESSION['idUsuario'], $id, $entityManager);
                        //filtro para reservar que no sea admin
                        if (($_SESSION['rol'] != 'admin')) {
                            //cambiamos el color y el contenido dependiendo del valor que nos traiga $prueba
                            $bg_color = ($prueba == 1) ? 'btn btn-success' : 'btn btn-danger';
                            echo "<a id=\"suscripcion\" class=\"$bg_color\"  onclick=\"suscripcion('$id',this,$comensales)\">";
                            if ($prueba == 1) {
                                echo "Reservar";
                            } else {
                                echo "Anular reserva ";
                            }
                            echo "</a>";
                        }
                        ?>


                        <?php
                        //solo se puede eliminar noticias si es profesor o admin
                        if (isset($_SESSION['idUsuario'])) {
                            if ($_SESSION['rol'] == 'profesor' || $_SESSION['rol'] == 'admin') {
                                echo " <a class=\"btn btn-warning\" href=\"/citascocina/vista/registroReservas.php?modo=editar&idReserva=$id\">Editar</a>";
                                echo " <a data-id=\"$id\" class=\"eliminarReserva btn btn-danger\">Eliminar</a>";
                                echo " <a href=\"/citascocina/vista/verUsuariosReservas.php?idReserva=$id\" class=\"btn btn-info\"><i class=\"bi bi-person-check-fill\"></i></a>";
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
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button" id="cerrar">
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
            // funcion que devuelve 1 o 0 dependiendo si el usuario esta en la reserva o no
            function findReservaUsuario($usuario, $reserva, $entityManager)
            {
                $resultado = $entityManager->getRepository("usuario")
                    ->findByReserva($reserva);


                //bucle que recorre el array anterior para comprobar si el usuario existe en dicha reserva
                $usuario = $_SESSION['idUsuario'];

                // Obtener la reserva
                $reserva = $entityManager->getRepository("Reservas")
                    ->findOneBy(array('idReserva' => $reserva));

                // Obtener el usuario a editar
                $usu = $entityManager->getRepository("Usuario")
                    ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));

                // Obtener las reservas del usuario y convertir la colección a un array
                $reservas = $usu->getReserva()->toArray();

                // Verificar si la reserva ya está asignada al usuario
                $existe = false;
                foreach ($resultado as $user) {
                    if ($user['idUsuario'] == $usuario) {
                        $existe = true;
                        break;
                    }
                }


                if ($existe) {
                    // echo "El usuario ya tiene asignada esta reserva.";
                    return 0;
                } else {
                    // Asignar la reserva al usuario

                    // echo "La reserva se ha asignado correctamente";
                    return 1;
                }
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <!-- Core theme JS-->
    <script src="/citascocina/vista/js/scripts.js"></script>
    <script src="/citascocina/vista/js/verReservas.js"></script>
    <script src="/citascocina/vista/js/eliminarReserva.js"></script>
    <script src="/citascocina/vista/js/inscribirseReserva.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>