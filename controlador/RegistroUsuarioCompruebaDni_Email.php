<?php
// incluir header
include("../modelo/modeloUsuarios.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php

//funcion que devuelve true o false dependiendo de si encuentra el dni y email
function buscarDniEmail()
{
    $dni = $_POST['dni'];
    $sqlFindCorreo = "SELECT * FROM usuario where dni = '$dni'";
    $result = $GLOBALS["bd"]->query($sqlFindCorreo);

    $email = $_POST['email'];
    $sqlFindEmail = "SELECT * FROM usuario where email = '$email'";
    $resultEmail = $GLOBALS["bd"]->query($sqlFindEmail);
    $res = true;
    if ($result->rowCount() == 0 && $resultEmail->rowCount() == 0) {
        $res = false;
    }
    echo $res;
    return $res;
}
echo buscarDniEmail();
// }
