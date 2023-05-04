<?php
include("../modelo/modeloUsuarios.php");
use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
include("../modelo/Doctrine/Entity/Mensajes.php");
session_start();
//el siguiente codigo devuelve las listas con las coincidencias de usuarios
$input = $_POST['input'];
//esta consulta exclulle al usuario admin@admin.com y al mismo usuario de la sesion
$usuarios = $entityManager->getRepository("usuario")
    ->createQueryBuilder('u')
    ->where('u.email LIKE :input')
    ->andWhere('u.email != :admin_email')
    ->andWhere('u.email != :mismo_email')
    ->setParameter('input', '%' . $input . '%')
    ->setParameter('admin_email', 'admin@admin.com')
    ->setParameter('mismo_email', $_SESSION['email'])
    ->getQuery()
    ->getResult();

if (count($usuarios) > 0) {
    echo '<ul class="search-results">';
    foreach ($usuarios as $usuario) {
        $id = $usuario->getIdUsuario();
        $email = $usuario->getEmail();
        echo '<li class="search-results" id="' . $id . '" onclick="copyToInput(\'' . $email . '\')">' . $email . '</li>';
    }
    echo '</ul>';
} else {
    echo 'No se encontraron resultados.';
}


?>