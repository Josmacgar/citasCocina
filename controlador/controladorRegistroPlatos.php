<?php
include("../modelo/modeloUsuarios.php");
use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
include("../modelo/Doctrine/Entity/Platos.php");

// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php
$findUsuario = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    $tipo = $_POST['tipo'];
    $modo=$_POST['modo'];
    $idPlato=$_POST['idPlato'];

    if (isset($_POST['tipo']) && $_POST['tipo'] == 'dni') {
        // function comprobarDni(){
        //     $dni = $_POST['dni'];
        //     $sqlFindCorreo = "SELECT * FROM usuario where dni = '$dni'";
        //     $result = $GLOBALS["bd"]->query($sqlFindCorreo);
        //     $res = true;
        //     if ($result->rowCount() == 0) {
        //         $res = false;
        //     }
        //     echo $res;
        //     return $res;
        // }
        // echo comprobarDni();
    }elseif ($modo=='editar'){
        session_start();
        $noticiaEditar= new Noticias();
        $noticiaEditar = $entityManager->getRepository("noticias")->findOneBy(array('idNoticia' => $idNoticia));

        $usuario=new Usuario();
        $usuario = $entityManager->getRepository("usuario")
        ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));
        $noticiaEditar->setUsuario($usuario);
        $noticiaEditar->setTitulo($titulo);
        $noticiaEditar->setCuerpo($contenido);
        $fecha = new DateTime($date);
        $noticiaEditar->setFecha($fecha);
        $entityManager->persist($noticiaEditar);
        $entityManager->flush();
        header("Location:/citascocina/vista/platos.php");
    }else{    
        session_start();
        $plato = new Platos();
        $plato->setNombre($nombre);
        $plato->setImagen($imagen);
        $plato->setTipo($tipo);
        $entityManager->persist($plato);
        $entityManager->flush();
        header("Location:/citascocina/vista/platos.php");
    }

}
