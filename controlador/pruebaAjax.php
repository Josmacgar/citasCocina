<?php
include ("../modelo/conexion_BD.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function asd(){
        $email = $_POST['dni'];
    $sqlFindCorreo = "SELECT * FROM usuario where dni = '$email'";
    $result = $GLOBALS["bd"]->query($sqlFindCorreo);
    $res = true;
    if ($result->rowCount() == 0) {
        $res = false;
    }
    echo $res;
    return $res;
    }
    echo asd();
}
?>