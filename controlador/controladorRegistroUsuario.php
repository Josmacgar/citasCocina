<?php
// incluir header
include("../modelo/modeloUsuarios.php");
use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php
$findUsuario=true;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $dni=$_POST['dni'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $telefono=$_POST['telefono'];
    $fecha=$_POST['fecha'];

    if(!encontrarUsuario($email)){
        $cifrarpassword= hash("sha256",$password);
        // crearUsuario($nombre,$email,$cifrarpassword);
      $usuario = new Usuario();
      $usuario->setDni($dni);
      $usuario->setNombre($nombre);
      $usuario->setApellidos($apellidos);
      $date = new DateTime($fecha);
      $usuario->setFecha_nac($date);
      $usuario->setEmail($email);
      $usuario->setContraseña($cifrarpassword);
      $usuario->setTelefono($telefono);
      $usuario->setBaneado(0);
      $usuario->setRol('cliente');
      $entityManager->persist($usuario);
      $entityManager->flush();
        header("Location:/citascocina/vista/login.php");
        $findUsuario=true;
    }else{
      $findUsuario=false;
    }
}
?>