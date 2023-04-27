<?php
// incluir header
include("header.php");
include("../controlador/controladorLogin.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>citasCocina</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="vista/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="vista/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body id="page-top">
    <main class="form-signin w-100 m-auto">

        <div id="logoSesion">
            <img class="mb-4" src="img/listarUsuarios.png" alt="" width="90" height="85">
        </div>

        <h1 class="h3 mb-3 fw-normal">Usuarios del sistema</h1>
    </main>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">DNI</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDOS</th>
                <th scope="col">FECHA</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">BANEADO</th>
                <th scope="col">ROL</th>
            </tr>
        </thead>
        <?php
        //contador que se va incrementando por cada fila 
        $contador = 1;
        $usuarios = $entityManager->getRepository("usuario")
            ->findAll();
        foreach ($usuarios as $key) {
            //formato de fecha
            $fecha = $key->getFecha_nac();
            $fecha_str = $fecha->format('d/m/Y');
        ?>
            <tbody>
                <!-- este tr comprueba si esta baneado o no para cambiar la clase y ponerla en roja -->
                <tr class="<?php echo $key->getBaneado() == 1 ? 'table-danger' : ''; ?>">
                    <th scope="row"><?php echo $contador ?></th>
                    <td><?php echo $key->getDni() ?></td>
                    <td><?php echo $key->getNombre() ?></td>
                    <td><?php echo $key->getApellidos() ?></td>
                    <td><?php echo $fecha_str ?></td>
                    <td><?php echo $key->getEmail() ?></td>
                    <td><?php echo $key->getTelefono() ?></td>
                    <td><?php echo $key->getBaneado() ?></td>
                    <td><?php echo $key->getRol() ?></td>
                </tr>
            </tbody>
            <?php $contador += 1; ?>
        <?php
        }
        ?>

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