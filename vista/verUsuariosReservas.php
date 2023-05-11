<?php
// incluir header
include("header.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $idReserva = $_GET['idReserva'];
}
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Dni</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">email</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Telefono</th>

                </tr>
            </thead>
            <?php
            //contador que se va incrementando por cada fila 
            $contador = 1;
            //obtenemos el usuario
            $reservas = $entityManager->getRepository("usuario")
                ->findByReserva($idReserva);

            //recorremos las reservas y las vamos mostrando
            foreach ($reservas as $key) {
                //formato de fecha
                $fecha = $key['fecha_nac'];
                $fecha_str = $fecha->format('d/m/Y');
            ?>
                <tbody class="tbodyMensajes">
                    <tr data-bs-toggle="modal" data-bs-target="#verMensaje">
                        <th scope="row"><?php echo $contador ?></th>
                        <td><?php echo $key['dni'] ?></td>
                        <td><?php echo $key['nombre'] ?></td>
                        <td><?php echo $key['apellidos'] ?></td>
                        <td><?php echo $key['email'] ?></td>
                        <td><?php echo $fecha_str ?></td>
                        <td><?php echo $key['telefono'] ?></td>

                    </tr>
                </tbody>
            <?php
                $contador += 1;
            }
            ?>
            <tfoot>
                <tr>
                    <td colspan="7" style="text-align: left;"> <b>Total:</b> <?php echo $contador - 1 ?></td>
                </tr>
            </tfoot>
        </table>
        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <script src="/citascocina/vista/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>