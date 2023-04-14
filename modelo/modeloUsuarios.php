<?php
include ("conexion_BD.php");
//funcion que devuelve true si encuentra el usuario que se la pasa como parametro
function encontrarUsuario($email){
    $sqlFindCorreo = "SELECT * FROM usuario where email = '$email'";
    $result = $GLOBALS["bd"]->query($sqlFindCorreo);
    $res = true;

    if ($result->rowCount() == 0) {
        $res = false;
    }

    return $res;
}
//funcion que devuelve los datos del email pasado como parametro
function obtenerCredenciales($email){
    $sqlCredenciales = "SELECT * FROM usuario WHERE email='$email'";
    $result = $GLOBALS["bd"]->query($sqlCredenciales);

    if ($result->rowCount() == 0) {

    } else {
        $res = $result->fetch(PDO::FETCH_ASSOC);
        $dni = $res["dni"];
        $contraseña = $res["contraseña"];
        $nombre=$res["nombre"];
        $baneado=$res['baneado'];
        $rol=$res['rol'];
        return array($dni, $contraseña,$nombre,$baneado,$rol);
    }
}