<?php
use Doctrine\ORM\Mapping as ORM;
require(dirname(__FILE__, 2) . '/Repository/ProfesorRepository.php');

/**
    @ORM\Entity(repositoryClass="ProfesorRepository")
*/
class Profesor extends Usuario {

    function __construct(){
    }

    public function __toString() {
        return "Profesor: " . $this->getDni() . " - "
            . $this->getNombre() . " - "
            . $this->getApellidos(). " - "
            . $this->getFecha_nac()->format('Y-m-d H:i:s') . " - "
            . $this->getEmail() . " - "
            . $this->getTelefono() . " - ";
    }
}

