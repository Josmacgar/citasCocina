<?php
include("../modelo/modeloUsuarios.php");
use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
include("../modelo/Doctrine/Entity/Mensajes.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario=$_POST['destinatario'];
    $asunto=$_POST['asunto'];
    $contenido=$_POST['contenido'];
    $fecha = new DateTime();
    //creamos el usuario del remitente
    $remitente=new Usuario();
    $remitente = $entityManager->getRepository("usuario")
    ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));
    //obtenemos el destinatario
    $desti = $entityManager->getRepository("usuario")
    ->findOneBy(array('email' => $destinatario));
    // $prueba=$usuario->getIdUsuario();
}


$mensaje= new Mensajes();
$mensaje->setUsuario($remitente);
$mensaje->setDestinatario($desti->getIdUsuario());
$mensaje->setAsunto($asunto);
$mensaje->setCuerpo($contenido);
$mensaje->setFecha($fecha);

$entityManager->persist($mensaje);
$entityManager->flush();
header("Location:/citascocina/vista/mensajes.php");

?>