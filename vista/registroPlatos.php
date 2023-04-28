<?php
// incluir header
include("header.php");
include("../controlador/controladorRegistroPlatos.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  //obtetemos el modo su hay un get y obtenemos los datos del usuario
  //para imprimirlos en los input para editar
  if (isset($_GET['modo'])) {
    //obtenemos el id de la noticia a editar
    if (isset($_GET['idPlato'])) {
      $idPlato=$_GET['idPlato'];
    }
    $modo = $_GET['modo'];
    $datos = $entityManager->getRepository("platos")
      ->findOneBy(array('idPlato' => $idPlato));
  }
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
    <title>Registro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>
  <main class="form-signin w-100 m-auto">
    <form action="../controlador/controladorRegistroPlatos.php" method="POST" id="formulario" onsubmit="return validarFormulario()">
      <div id="logoSesion">
        <img class="mb-4" src="/citascocina/vista/img/noticia.png" alt="" width="72" height="57">
      </div>

      <h1 class="h3 mb-3 fw-normal"><?php echo isset($modo) ? 'Editar' : 'Registrar Plato'; ?></h1>
      <input hidden type="text" name="modo" value="<?php if (isset($modo)) echo ($modo); ?>">
      <input hidden type="text" name="idPlato" value="<?php if (isset($idPlato)) echo ($idPlato); ?>">
      
      <div class="form-floating">
        <input type="text" class="form-control" id="nombre" placeholder="Hamburguesa" name="nombre" value="<?php if (isset($modo)) echo ($datos->getNombre()); ?>">
        <label for="nombre">Nombre</label>
      </div>
      <section id="errorNombre" class="d-none">Formato de nombre incorrecto</section>

      <div class="form-floating">
        <input type="text" class="form-control" id="imagen" placeholder="http://..." name="imagen" value="<?php if (isset($modo)) echo ($datos->getImagen()); ?>">
        <label for="imagen">Imagen</label>
      </div>
      <section id="errorImagen" class="d-none">Formato de imagen incorrecto</section>

      <div class="form-floating">
        <select name="tipo" id="tipo" class="form-control">
            <option value="1">1º Plato</option>
            <option value="2">2º Plato</option>
            <option value="postre">Postre</option>
        </select>
        <label for="tipo">Fecha</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit"><?php echo isset($modo) ? 'Editar' : 'Crear'; ?></button>
    </form>

  </main>
  <script src="/citascocina/vista/js/validarPlatos.js"></script>
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