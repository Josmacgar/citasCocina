<?php
$usuario = "root";
$password = "";
$cadena_conexion = "mysql:dbname=citasCocina;host=localhost";

try {
    $GLOBALS["bd"] = new PDO($cadena_conexion, $usuario, $password, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    echo "Error en la conexión " . $e->getMessage();
}
?>