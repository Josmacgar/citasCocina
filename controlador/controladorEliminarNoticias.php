<?php
// incluir header
include("../modelo/modeloUsuarios.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Noticias.php");
// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['idNoticia'];
    $noticia = $entityManager->getRepository("noticias")
    ->findOneBy(array('idNoticia' => $id));

    $entityManager->remove($noticia);
    $entityManager->flush();
}
