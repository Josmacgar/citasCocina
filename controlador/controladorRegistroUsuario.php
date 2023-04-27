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
    $modo=$_POST['modo'];

    //si el modo es editar hace un update y si no crea un usuario
    if ($modo=='editar') {
      session_start();

      $cifrarpassword= hash("sha256",$password);
      $usuEditar = $entityManager->getRepository("usuario")
      ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));
      $usuEditar->setDni($dni);
      $usuEditar->setNombre($nombre);
      $usuEditar->setApellidos($apellidos);
      $date = new DateTime($fecha);
      $usuEditar->setFecha_nac($date);
      $usuEditar->setEmail($email);
      $usuEditar->setContraseña($cifrarpassword);
      $usuEditar->setTelefono($telefono);
      $usuEditar->setBaneado(0);
      $usuEditar->setRol('cliente');
      $entityManager->persist($usuEditar);
      $entityManager->flush();
        header("Location:/citascocina/vista/editarPerfil.php");
    }else {
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

}
?>