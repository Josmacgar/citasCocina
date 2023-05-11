<?php
// incluir header
include("header.php");
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Reservas.php");
include("../modelo/Doctrine/Entity/Platos.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  //obtetemos el modo si hay un get y obtenemos los datos del usuario
  //para imprimirlos en los input para editar
  if (isset($_GET['modo'])) {
    //obtenemos el id de la noticia a editar
    if (isset($_GET['idReserva'])) {
      $idReserva = $_GET['idReserva'];
    }
    $modo = $_GET['modo'];
    $datos = $entityManager->getRepository("reservas")
      ->findOneBy(array('idReserva' => $idReserva));
  }
}
$platosAll = $entityManager->getRepository("platos")
  ->findAll();

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
  <title>Registro</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <!-- <link rel="stylesheet" href="css/registroReservas.css"> -->
  <!-- <link rel="stylesheet" href="css/estilos.css"> -->

</head>

<body>
  <main class="form-signin w-100 m-auto">
    <!-- <form action="../controlador/controladorRegistroReservas.php" method="POST" id="formulario" onsubmit="return validarFormulario()"> -->
      <div id="logoSesion">
        <img class="mb-4" src="/citascocina/vista/img/reservas.svg" alt="" width="150" height="90">
      </div>

      <h1 class="h3 mb-3 fw-normal"><?php echo isset($modo) ? 'Editar' : 'Registrar Reserva'; ?></h1>
      <input hidden type="text" id="modo" name="modo" value="<?php if (isset($modo)) echo ($modo); ?>">
      <input hidden type="text" id="idReserva" name="idReserva" value="<?php if (isset($idReserva)) echo ($idReserva); ?>">

      <div class="form-floating">
        <input type="number" class="form-control" id="comensales" placeholder="20" name="comensales" value="<?php if (isset($modo)) echo ($datos->getComensales()); ?>">
        <label for="comensales">Comensales</label>
      </div>
      <section id="errorComensales" class="d-none">Formato de numero incorrecto</section>
      <div class="form-floating">

      <input type="number" class="form-control" id="precio" placeholder="20" name="precio" value="<?php if (isset($modo)) echo ($datos->getPrecio()); ?>">
        <label for="precio">Precio</label>
      </div>
      <section id="errorPrecio" class="d-none">Formato de precio incorrecto</section>
      <div class="form-floating">
        <input type="datetime-local" class="form-control" id="date" placeholder="Fecha" name="date">
        <label for="fecha">Fecha</label>
      </div>
      <section id="errorDate" class="d-none">Formato de fecha incorrecto</section>

      <div class="tipoPlatos d-flex">
      <?php
      // $resultado = $entityManager->getRepository("platos")
      // ->findPLatos($idReserva);
      ?>
      <select name="platos" class="form-control" id="selectPlatos">
        <?php
        //foreach con if para mostrar el tipo de plato o postre
        foreach ($platosAll as $plato) {
          $tipo = $plato->getTipo() . (($plato->getTipo() == 1 || $plato->getTipo() == 2) ? " plato" : "");
          $nombre = $plato->getNombre();
          echo '<option value="' . $plato->getIdPlato() . '">' . $nombre . ' - ' . $tipo . '</option>';
        }
        ?>
      </select>
      <a class="w-15 col-2 p-1 btn btn-lg btn-primary" id="botonMas">+</a>
      </div>
      <div id="listaPlatos"></div>

      <button class="w-100 btn btn-lg btn-primary" id="enviar" ><?php echo isset($modo) ? 'Editar' : 'Crear'; ?></button>
    <!-- </form> -->

  </main>
  <script src="/citascocina/vista/js/validarReserva.js"></script>
  <script src="/citascocina/vista/js/crearReservas.js"></script>
  <script src="/citascocina/vista/js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>