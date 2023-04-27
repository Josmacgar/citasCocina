<?php
include("../modelo/modeloUsuarios.php");
use Doctrine\Common\Collections\ArrayCollection;
// require_once dirname(__FILE__, 1) . "citasCocina/modelo/Doctrine/bootstrap.php";
include("../modelo/Doctrine/bootstrap.php");
include("../modelo/Doctrine/Entity/Usuario.php");
include("../modelo/Doctrine/Entity/Noticias.php");

// require_once dirname(__FILE__, 1) . "modelo/Doctrine/Entity/Usuario.php";
// C:\xampp\htdocs\citasCocina\modelo\Doctrine\PopulateBD.php
$findUsuario = true;
//obtenemos el id de noticia
$idNoticia=0;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['idNoticia'])){
        $idNoticia=$_GET['idNoticia'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $date = $_POST['date'];
    $modo=$_POST['modo'];

    if (isset($_POST['tipo']) && $_POST['tipo'] == 'dni') {
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
    }elseif ($modo=='editar'){
        session_start();
        $noticiaEditar = $entityManager->getRepository("noticias")
        ->findOneBy(array('idNoticia' => 55));

        $usuario=new Usuario();
        $usuario = $entityManager->getRepository("usuario")
        ->findOneBy(array('idUsuario' => 22));
        $noticiaEditar->setUsuario($usuario);
        $noticiaEditar->setTitulo($titulo);
        $noticiaEditar->setCuerpo($contenido);
        $fecha = new DateTime($date);
        $noticiaEditar->setFecha($fecha);
        $entityManager->persist($noticiaEditar);
        $entityManager->flush();
        header("Location:/citascocina/vista/noticias.php");
    }else{    
        session_start();
        $noticia = new Noticias();
        $usuario=new Usuario();
        $usuario = $entityManager->getRepository("usuario")
        ->findOneBy(array('idUsuario' => $_SESSION['idUsuario']));
        $noticia->setUsuario($usuario);
        $noticia->setTitulo($titulo);
        $noticia->setCuerpo($contenido);
        $fecha = new DateTime($date);
        $noticia->setFecha($fecha);
        $entityManager->persist($noticia);
        $entityManager->flush();
        header("Location:/citascocina/vista/noticias.php");
    }

}
