<?php
// incluir header
include("header.php");
include("../controlador/controladorLogin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
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
    <title>header</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/estilos.css">


</head>
<body>

    <main class="form-signin w-100 m-auto">
        <form action="../controlador/controladorLogin.php" method="POST" id="formulario">
          <div id="logoSesion">
            <img class="mb-4" src="img/login.png" alt="" width="72" height="57">
          </div>
    
          <h1 class="h3 mb-3 fw-normal">Iniciar sesion</h1>
    
          <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" 
            value="<?php if(isset($_GET['email'])) echo $_GET['email']?>">
            <label for="email">Email</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Password" name="contraseña">
            <label for="password">Password</label>
          </div>
    
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Recuerdame
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
          <label class="mt-3 mb-3 text-muted">¿No tienes cuenta? <a href="/citascocina/vista/registroUsuario.php">Crear cuenta</a></label>
        </form>
               
          <p id="error">
            <?php 
             if($errorPassword==true){ echo "Error en la contraseña";}
             if($usuarioNoregistrado==true){echo "Usuario no registrado";}
        
            ?>
          </p>
        
    
      </main>
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