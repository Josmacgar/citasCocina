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
    $modo=$_POST['modo'];
    $fecha=$_POST['date'];
    $comensales=$_POST['comensales'];
    $precio=$_POST['precio'];

    if ($modo=='editar') {
        
    }else{
        $reserva = new Reservas();
        $reserva->setFecha($fecha);
        $reserva->setComensales($comensales);
        $reserva->setPrecio($precio);

        $entityManager->persist($reserva);
        $entityManager->flush();
        header("Location:/citascocina/vista/reservas.php");
    }
}

//consulta que devuelve los platos que hay en dicha reserva
$resultado = $entityManager->getRepository("platos")
    ->findPLatos($reserva);


// Obtener la reserva
$reserva = $entityManager->getRepository("Reservas")
    ->findOneBy(array('idReserva' => $reserva));


// Obtener las reservas del usuario y convertir la colección a un array
$reservas = $usu->getReserva()->toArray();

// Verificar si la reserva ya está asignada al usuario
$existe = false;
foreach ($resultado as $user) {
    if ($user['idUsuario'] == $usuario) {
        $existe = true;
        break;
    }
}


if ($existe) {
    // Eliminar la reserva del usuario
    foreach ($reservas as $key => $value) {
        if ($value->getIdReserva() == $reserva->getIdReserva()) {
            unset($reservas[$key]);
            break;
        }
    }
    $usu->setReserva(new ArrayCollection($reservas));

    // Persistir el usuario editado
    $entityManager->persist($usu);
    $entityManager->flush();

    // echo "La reserva se ha eliminado correctamente";
    echo 1;
} else {
    // Asignar la reserva al usuario
    $reservas[] = $reserva;
    $usu->setReserva(new ArrayCollection($reservas));

    // Persistir el usuario editado
    $entityManager->persist($usu);
    $entityManager->flush();

    // echo "La reserva se ha asignado correctamente";
    echo 0;
}



