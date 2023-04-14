<?php
include("../modelo/modeloUsuarios.php");
    //variables de errores
    $errorPassword=false;
    $usuarioNoregistrado=false;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST['email'];
      $contraseña = $_POST['contraseña'];
      //ciframos la contraseña
      $cifrarPassword = hash("sha256", $contraseña);
      //si el usuario existe en bd obtiene los credenciales para comprobar password 
      if (encontrarUsuario($email)) {
        $credenciales = obtenerCredenciales($email); //devuelve array con los datos
        //si la contraseña es correcta crea la sesion y carga home
        if ($credenciales[1] == $cifrarPassword) {
          session_start();
          $_SESSION['email'] = $credenciales[0];
          $_SESSION['nombre'] = $credenciales[2];
          $_SESSION['codUsu'] = $credenciales[3];
          // header("Location:../index.html");
          echo "<script type=\"text/javascript\">window.location.href = \"../index.php\";</script>";
        } else {
          $errorPassword = true;
          header("Location:../vista/login.php?email=$email");
          // echo "<script type=\"text/javascript\">window.location.href = \"../vista/login.php\";</script>";
        }
      } else {
        $usuarioNoregistrado = true;
      }
    }
?>