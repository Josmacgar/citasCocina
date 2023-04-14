<?php
include ("../modelo/conexion_BD.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function asd(){
        $email = $_POST['email'];
    $sqlFindCorreo = "SELECT * FROM usuario where email = '$email'";
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