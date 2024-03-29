<?php
include("../modelo/modeloUsuarios.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
include("../modelo/Doctrine/Entity/Reservas.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reserva = $_POST['reserva'];
    $comensales = $_POST['comensales'];
}

//consulta que devuelve los usuarios que hay en dicha reserva
$resultado = $entityManager->getRepository("usuario")
    ->findByReserva($reserva);


//obtenemos el usuario
$usuario = $_SESSION['idUsuario'];

// Obtener la reserva
$reserva = $entityManager->getRepository("Reservas")
    ->findOneBy(array('idReserva' => $reserva));


$usu = $entityManager->getRepository("Usuario")
    ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));

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


//if para comprobar si existen platos en la reserva, si no existen envia un 2 y no hace nada 
if ($existe) {

    // Eliminar la reserva del usuario
    foreach ($reservas as $key => $value) {
        if ($value->getIdReserva() == $reserva->getIdReserva()) {
            unset($reservas[$key]);
            break;
        }
    }
    $usu->setReserva(new ArrayCollection($reservas));
    //sumamos a 1 los comensales de la reserva 
    $reserva->setComensales($comensales + 1);
    // Persistir el usuario editado
    $entityManager->persist($usu);
    $entityManager->persist($reserva);
    $entityManager->flush();

    // echo "La reserva se ha eliminado correctamente";
    echo 1;
} else {
    //if que controla que para apuntarse a la reserva tiene que haber mas de 0 comensales
    if ($comensales - 1 < 0) {
        echo 2;
    } else {
        // Asignar la reserva al usuario
        $reservas[] = $reserva;
        $usu->setReserva(new ArrayCollection($reservas));
        //restamos a 1 los comensales de la reserva 
        $reserva->setComensales($comensales - 1);
        // Persistir el usuario editado
        $entityManager->persist($usu);
        $entityManager->persist($reserva);
        $entityManager->flush();
        echo 0;
    }
}
