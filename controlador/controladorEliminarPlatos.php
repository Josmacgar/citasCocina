<?php
// incluir header
include("../modelo/modeloUsuarios.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/PLatos.php");
// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['idPlato'];
    $plato = $entityManager->getRepository("platos")
    ->findOneBy(array('idPlato' => $id));

    $entityManager->remove($plato);
    $entityManager->flush();
}
