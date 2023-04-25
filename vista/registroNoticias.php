<?php
// incluir header
include("header.php");
include("../controlador/controladorRegistroNoticia.php");
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
    <form action="../controlador/controladorRegistroNoticia.php" method="POST" id="formulario" onsubmit="return validarFormulario()">
      <div id="logoSesion">
        <img class="mb-4" src="/citascocina/vista/img/noticia.png" alt="" width="72" height="57">
      </div>

      <h1 class="h3 mb-3 fw-normal">Registrar Noticia</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="titulo" placeholder="49558744A" name="titulo">
        <label for="titulo">Titulo</label>
      </div>
      <section id="errortitulo" class="d-none">Formato de Titulo incorrecto</section>
      <div class="form-floating">
         <!-- <input type="text" class="form-control" id="nombre" placeholder="name@example.com" name="nombre"> -->

        <textarea class="form-control" name="contenido" id="contenido" cols="30" rows="10" placeholder="Contenido..."></textarea>
        <label for="contenido">Contenido</label> 
      </div>
      <section id="errorContenido" class="d-none">Formato de Contenido incorrecto</section>

      <div class="form-floating">
        <input type="date" class="form-control" id="date" placeholder="Fecha" name="date">
        <label for="fecha">Fecha</label>
      </div>
      <section id="errorDate" class="d-none">Formato de fecha incorrecto</section>
      
      <button class="w-100 btn btn-lg btn-primary" type="submit">Crear</button>
    </form>

  </main>
  <script src="/citascocina/vista/js/validarNoticia.js"></script>
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