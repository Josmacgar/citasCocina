<?php
// incluir header
include("../modelo/modeloUsuarios.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario=$_POST['idUsuario'];
    $valor=$_POST['valor'];
    $modo=$_POST['modo'];

    if ($modo=='rol') {
        $usuario = $entityManager->getRepository("usuario")
        ->findOneBy(array('idUsuario' => $idUsuario));
    
        $usuario->setRol($valor);
        $entityManager->persist($usuario);
        $entityManager->flush();
    }else{
        $usuario = $entityManager->getRepository("usuario")
        ->findOneBy(array('idUsuario' => $idUsuario));
    
        $usuario->setBaneado($valor);
        $entityManager->persist($usuario);
        $entityManager->flush();
    }


}