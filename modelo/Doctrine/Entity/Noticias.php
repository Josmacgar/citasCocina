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
        @ORM\ManyToOne(targetEntity="Profesor")
        @ORM\JoinColumn(name="profesor",referencedColumnName="dni")
    */
    private $profesor;

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
    public function getProfesor()
    {
        return $this->profesor;
    }

    /**
     * Set the value of profesor
     *
     * @return  self
     */ 
    public function setProfesor($profesor)
    {
        $this->profesor = $profesor;

        return $this;
    }

    public function __toString() {
        return "Noticias: " . $this->getTitulo() . " - "
            . $this->getCuerpo() . " - "
            . $this->getFecha(). " - "
            . $this->getProfesor(). " - ";
    }
}

