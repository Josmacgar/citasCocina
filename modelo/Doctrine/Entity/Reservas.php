<?php
use Doctrine\ORM\Mapping as ORM;
require(dirname(__FILE__, 2) . '/Repository/ReservasRepository.php');

/**
    @ORM\Entity(repositoryClass="ReservasRepository")
*/
class Reservas {
    /**
        @ORM\Id
        @ORM\Column(type="integer")
        @ORM\GeneratedValue
    */
    private $idReserva;
    /**
        @ORM\Column(type="date")
    */
    private $fecha;
    /**
        @ORM\Column(type="integer")
    */
    private $comensales;
    /**
        @ORM\Column(type="float")
    */
    private $precio;


    
    function __construct(){
    }

    /**
     * Get the value of idReserva
     */ 
    public function getIdReserva()
    {
        return $this->idReserva;
    }

    /**
     * Set the value of idReserva
     *
     * @return  self
     */ 
    public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of usuario
     */ 

        /**
     * Get the value of comensales
     */ 
    public function getComensales()
    {
        return $this->comensales;
    }

    /**
     * Set the value of comensales
     *
     * @return  self
     */ 
    public function setComensales($comensales)
    {
        $this->comensales = $comensales;

        return $this;
    }

    public function __toString() {
        return "Mensaje: " . $this->getIdReserva() . " - "
            . $this->getFecha() . " - "
            . $this->getComensales(). " - "
            . $this->getPrecio() . " - ";
    }

}

