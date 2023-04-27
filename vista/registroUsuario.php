<?php
// incluir header
include("header.php");
include("../controlador/controladorRegistroUsuario.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  //obtetemos el modo su hay un get y obtenemos los datos del usuario
  //para imprimirlos en los input para editar
  if (isset($_GET['modo'])) {
    $modo = $_GET['modo'];
    $datos = $entityManager->getRepository("usuario")
      ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));
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
    <form action="../controlador/controladorRegistroUsuario.php" method="POST" onsubmit="return validarFormulario()">
      <div id="logoSesion">
        <img class="mb-4" src="/citascocina/vista/img/registrarse.png" alt="" width="72" height="57">
      </div>


      <h1 class="h3 mb-3 fw-normal"><?php echo isset($modo) ? 'Editar' : 'Registrarse'; ?></h1>
      <input hidden type="text" name="modo" value="<?php if (isset($modo)) echo ($modo); ?>">
      <div class="form-floating">
        <input type="text" class="form-control" id="dni" placeholder="49558744A" name="dni" value="<?php if (isset($modo)) echo ($datos->getDni()); ?>">
        <label for="dni">Dni</label>
      </div>
      <section id="errorDni" class="d-none">Formato de DNI incorrecto</section>
      <section id="dniExiste" class="d-none">El DNI ya existe</section>
      <div class="form-floating">
        <input type="text" class="form-control" id="nombre" placeholder="name@example.com" name="nombre" value="<?php if (isset($modo)) echo ($datos->getNombre()); ?>">
        <label for="nombre">Nombre</label>
      </div>
      <section id="errorNombre" class="d-none">Formato de nombre incorrecto</section>
      <div class="form-floating">
        <input type="text" class="form-control" id="apellidos" placeholder="Lopez Cardenas" name="apellidos" value="<?php if (isset($modo)) echo ($datos->getApellidos()); ?>">
        <label for="apellidos">Apellidos</label>
      </div>
      <section id="errorApe" class="d-none">Formato de Apellidos incorrecto</section>
      <div class="form-floating">
        <?php
        //if para desabilitar el email si esta en modo editar
        if (isset($modo)) {
          echo "<input readonly type=\"email\" class=\"form-control\" id=\"email\" placeholder=\"Email\" name=\"email\" value=\"" . (isset($modo) ? $datos->getEmail() : "") . "\">";
          echo "<label for=\"email\">Email</label>";
        } else {
          echo "<input type=\"email\" class=\"form-control\" id=\"email\" placeholder=\"Email\" name=\"email\" value=\"" . (isset($modo) ? $datos->getEmail() : "") . "\">";
          echo "<label for=\"email\">Email</label>";
        }
        ?>

      </div>
      <section id="errorEmail" class="d-none">Formato de email incorrecto</section>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <label for="password">Contraseña</label>
      </div>
      <section id="errorContraseña" class="d-none">Formato de contraseña incorrecto</section>
      <div class="form-floating">
        <input type="tel" class="form-control" id="telefono" placeholder="625477552" name="telefono" value="<?php if (isset($modo)) echo ($datos->getTelefono()); ?>">
        <label for="telefono">Telefono</label>
      </div>
      <section id="errorTel" class="d-none">Formato de Telefono incorrecto</section>
      <div class="form-floating">
        <input type="date" class="form-control" id="date" placeholder="Fecha" name="fecha">
        <label for="fecha">Fecha</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit"><?php echo isset($modo) ? 'Editar' : 'Registrarse'; ?></button>
      <?php
      //si no existe sesion mostramos el login
      if (!isset($_SESSION['email'])) {
        echo "<label class=\"mt-3 mb-3 text-muted\">¿Tienes una cuenta? <a href=\"login.php\">Login</a></label>";
      }
      ?>
    </form>
    <?php
    if ($findUsuario == false) {
      echo "<p>Usuario existente</p>";
    }
    ?>
  </main>
  <script src="/citascocina/vista/js/validarRegistro.js"></script>
  <script src="/citascocina/vista/js/validarLogin.js"></script>
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