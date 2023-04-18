<?php
use Doctrine\ORM\Mapping as ORM;
require(dirname(__FILE__, 2) . '/Repository/MensajesRepository.php');

/**
    @ORM\Entity(repositoryClass="MensajesRepository")
*/
class Mensajes {
    /**
        @ORM\Id
        @ORM\Column(type="integer")
        @ORM\GeneratedValue
    */
    private $idMensaje;
    /**
        @ORM\Column(type="date")
    */
    private $fecha;
    /**
        @ORM\Column(type="string")
    */
    private $asunto;
    /**
        @ORM\Column(type="string")
    */
    private $cuerpo;
    /**
        @ORM\Column(type="string")
    */
    private $destinatario;
    /**
        @ORM\ManyToOne(targetEntity="Usuario")
        @ORM\JoinColumn(name="usuario",referencedColumnName="dni")
    */
    private $usuario;
    
    function __construct(){
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
     * Get the value of asunto
     */ 
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set the value of asunto
     *
     * @return  self
     */ 
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get the value of cuerpo
     */ 
    public function getCuerpo()
    {
        return $this->cuerpo;
    }

    /**
     * Set the value of cuerpo
     *
     * @return  self
     */ 
    public function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;

        return $this;
    }

    /**
     * Get the value of destinatario
     */ 
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Set the value of destinatario
     *
     * @return  self
     */ 
    public function setDestinatario($destinatario)
    {
        $this->destinatario = $destinatario;

        return $this;
    }
    /**
     * Get the value of idMensaje
     */ 
    public function getIdMensaje()
    {
        return $this->idMensaje;
    }

    /**
     * Set the value of idMensaje
     *
     * @return  self
     */ 
    public function setIdMensaje($idMensaje)
    {
        $this->idMensaje = $idMensaje;

        return $this;
    }
    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function __toString() {
        return "Mensaje: " . $this->getFecha() . " - "
            . $this->getAsunto() . " - "
            . $this->getCuerpo(). " - "
            . $this->getDestinatario() . " - "
            . $this->getUsuario() . " - ";
    }

}

