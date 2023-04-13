<?php
use Doctrine\ORM\Mapping as ORM;
require(dirname(__FILE__, 2) . '/Repository/ClienteRepository.php');

/**
    @ORM\Entity(repositoryClass="UsuarioRepository")
*/
class Cliente extends Usuario {
    
    function __construct(){
    }

    public function __toString() {
        return "Cliente: " . $this->getDni() . " - "
            . $this->getNombre() . " - "
            . $this->getApellidos(). " - "
            . $this->getFecha_nac() . " - "
            . $this->getEmail() . " - "
            . $this->getTelefono() . " - ";
    }
}

