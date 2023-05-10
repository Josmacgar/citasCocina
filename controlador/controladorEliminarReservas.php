<?php
// incluir header
include("../modelo/modeloUsuarios.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Reservas.php");
include("../modelo/Doctrine/Entity/Platos.php");
// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['idReserva'];
    $reserva = $entityManager->getRepository("reservas")
    ->findOneBy(array('idReserva' => $id));

       // Eliminar los platos asociados a la reserva
       $plato = $entityManager->getRepository("platos")
       ->findOneBy(array('idPlato' => $id));
       foreach ($platos as $plato) {
           $entityManager->remove($plato);
       }

    $entityManager->remove($reserva);

    $entityManager->flush();
}

