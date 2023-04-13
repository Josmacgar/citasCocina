<?php
use Doctrine\ORM\Mapping as ORM;
require(dirname(__FILE__, 2) . '/Repository/PlatosRepository.php');

/**
    @ORM\Entity(repositoryClass="PlatosRepository")
*/
class Platos {
    /**
        @ORM\Id
        @ORM\Column(type="integer")
    */
    private $idPlato;
    /**
        @ORM\Column(type="string")
    */
    private $nombre;
    /**
        @ORM\Column(type="string")
    */
    private $imagen;
    /**
        @ORM\Column(type="string")
    */
    private $tipo;

    
    function __construct(){
    }

    /**
     * Get the value of idPlato
     */ 
    public function getIdPlato()
    {
        return $this->idPlato;
    }

    /**
     * Set the value of idPlato
     *
     * @return  self
     */ 
    public function setIdPlato($idPlato)
    {
        $this->idPlato = $idPlato;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
    public function __toString() {
        return "Plato: " . $this->getNombre() . " - "
            . $this->getImagen() . " - "
            . $this->getTipo(). " - ";
    }
}

