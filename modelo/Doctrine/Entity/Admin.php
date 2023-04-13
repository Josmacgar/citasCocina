<?php
use Doctrine\ORM\Mapping as ORM;
require(dirname(__FILE__, 2) . '/Repository/AdminRepository.php');

/**
    @ORM\Entity(repositoryClass="AdminRepository")
*/
class Admin extends Usuario {

    function __construct(){
    }

    public function __toString() {
        return "Admin: " . $this->getDni() . " - "
            . $this->getNombre() . " - "
            . $this->getApellidos(). " - "
            . $this->getFecha_nac()->format('Y-m-d H:i:s') . " - "
            . $this->getEmail() . " - "
            . $this->getTelefono() . " - ";
    }
}

