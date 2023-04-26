<?php
// incluir header
include("../modelo/modeloUsuarios.php");

use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Noticias.php");
// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php
$findUsuario = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['tipo'] == 'dni') {
        function comprobarDni(){
            $dni = $_POST['dni'];
            $sqlFindCorreo = "SELECT * FROM usuario where dni = '$dni'";
            $result = $GLOBALS["bd"]->query($sqlFindCorreo);
            $res = true;
            if ($result->rowCount() == 0) {
                $res = false;
            }
            echo $res;
            return $res;
        }
        echo comprobarDni();
    }else{
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $date = $_POST['date'];
    
        $noticia = new Noticias();
        $noticia->setTitulo($titulo);
        $noticia->setCuerpo($contenido);
        $fecha = new DateTime($date);
        $noticia->setFecha($fecha);
        $entityManager->persist($noticia);
        $entityManager->flush();
        header("Location:/citascocina/vista/noticias.php");
    }

}
