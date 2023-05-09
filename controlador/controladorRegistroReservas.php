<?php
include("../modelo/modeloUsuarios.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Platos.php");
include("../modelo/Doctrine/Entity/Reservas.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idReserva = $_POST['idReserva'];
    $modo = $_POST['modo'];
    $fecha = $_POST['fecha'];
    $comensales = $_POST['comensales'];
    $precio = $_POST['precio'];
    $platos = $_POST['platos'];

    if ($modo == 'editar') {
    } else {
        //creamos la reserva
        $reserva = new Reservas();
        $date = new DateTime($fecha);
        $reserva->setFecha($date);
        $reserva->setComensales($comensales);
        $reserva->setPrecio($precio);
        //convertimos a un array $platos y persistimos para que en el bucle obtenga bien getIdReserva
        //sino no funciona porque no existe en la BD
        $separarPlatos = explode(",", $platos);
        $entityManager->persist($reserva);
        $entityManager->flush();
        //bucle que añade a cada plato la reserva 
        foreach ($separarPlatos as $key) {
            $reservaActual = $entityManager->getRepository("reservas")->findOneBy(array('idReserva' => $reserva->getIdReserva()));
            $plato = $entityManager->getRepository("platos")->findOneBy(array('idPlato' => intval($key)));
            $reservas[] = $reservaActual;
            $plato->setReserva(new ArrayCollection($reservas));
            $entityManager->persist($plato);
        }
        $entityManager->flush();
        //este header no funciona, pero se pone esto o un echo true para que la peticion ajax entre en el bien hecho del done
        header("Location:../vista/reservas.php");
    }
}
