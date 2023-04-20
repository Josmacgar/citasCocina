<?php
use Doctrine\ORM\Mapping as ORM;
require(dirname(__FILE__, 2) . '/Repository/NoticiaRepository.php');

/**
    @ORM\Entity(repositoryClass="NoticiaRepository")
*/
class Noticias {
    /**
        @ORM\Id
        @ORM\Column(type="integer")
        @ORM\GeneratedValue
    */
    private $idNoticia;
    
    /**
        @ORM\Column(type="string")
    */
    private $titulo;

    /**
        @ORM\Column(type="string")
    */
    private $cuerpo;

    /**
        @ORM\Column(type="date")
    */
    private $fecha;

    /**
        @ORM\ManyToOne(targetEntity="usuario")
        @ORM\JoinColumn(name="usuario",referencedColumnName="idUsuario")
    */
    private $usuario;

    function __construct(){
    }


    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

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
     * Get the value of profesor
     */ 
    public function getusuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of profesor
     *
     * @return  self
     */ 
    public function setUsuario($profesor)
    {
        $this->usuario = $profesor;

        return $this;
    }
        /**
     * Get the value of idNoticia
     */ 
    public function getIdNoticia()
    {
        return $this->idNoticia;
    }

    /**
     * Set the value of idNoticia
     *
     * @return  self
     */ 
    public function setIdNoticia($idNoticia)
    {
        $this->idNoticia = $idNoticia;

        return $this;
    }

    public function __toString() {
        return "Noticias: " . $this->getTitulo() . " - "
            . $this->getCuerpo() . " - "
            . $this->getFecha(). " - "
            . $this->getusuario(). " - ";
    }
}

