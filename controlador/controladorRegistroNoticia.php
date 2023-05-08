<?php
include("../modelo/modeloUsuarios.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
include("../modelo/Doctrine/Entity/Noticias.php");

// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $date = $_POST['date'];
    $modo = $_POST['modo'];
    $idNoticia = $_POST['idNoticia'];

    if ($modo == 'editar') {
        session_start();
        $noticiaEditar = new Noticias();
        $noticiaEditar = $entityManager->getRepository("noticias")->findOneBy(array('idNoticia' => $idNoticia));

        $usuario = new Usuario();
        $usuario = $entityManager->getRepository("usuario")
            ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));
        $noticiaEditar->setUsuario($usuario);
        $noticiaEditar->setTitulo($titulo);
        $noticiaEditar->setCuerpo($contenido);
        $fecha = new DateTime($date);
        $noticiaEditar->setFecha($fecha);
        $entityManager->persist($noticiaEditar);
        $entityManager->flush();
        header("Location:/citascocina/vista/noticias.php");
    } else {
        session_start();
        $noticia = new Noticias();
        $usuario = new Usuario();
        $usuario = $entityManager->getRepository("usuario")
            ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));
        $noticia->setUsuario($usuario);
        $noticia->setTitulo($titulo);
        $noticia->setCuerpo($contenido);
        $fecha = new DateTime($date);
        $noticia->setFecha($fecha);
        $entityManager->persist($noticia);
        $entityManager->flush();
        header("Location:/citascocina/vista/noticias.php");
    }
}
