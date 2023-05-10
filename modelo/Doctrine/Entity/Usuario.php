<?php
use Doctrine\ORM\Mapping as ORM;
require(dirname(__FILE__, 2) . '/Repository/UsuarioRepository.php');

/**
    @ORM\Entity(repositoryClass="UsuarioRepository")
*/
class Usuario {
    /**
        @ORM\Id
        @ORM\Column(type="integer")
        @ORM\GeneratedValue
    */
    private $idUsuario;
    /**
        @ORM\Column(type="string")
    */
    private $dni;
    
    /**
        @ORM\Column(type="string")
    */
    private $nombre;

    /**
        @ORM\Column(type="string")
    */
    private $apellidos;

    /**
        @ORM\Column(type="date")
    */
    private $fecha_nac;
    /**
        @ORM\Column(type="string")
    */
    private $email;
    /**
        @ORM\Column(type="string")
    */
    private $contraseña;
    /**
        @ORM\Column(type="integer")
    */
    private $telefono;
    /**
        @ORM\Column(type="integer")
    */
    private $baneado;
    /**
        @ORM\Column(type="string")
    */
    private $rol;
    /**
        @ORM\ManyToMany(targetEntity="Reservas")
        @ORM\JoinTable(name="reservas_cliente",
            joinColumns={@ORM\JoinColumn(name="idUsuario", referencedColumnName="idUsuario")},
            inverseJoinColumns={@ORM\JoinColumn(name="idReserva", referencedColumnName="idReserva", onDelete="CASCADE")}
        )
    */
    private $reserva;

    function __construct(){
    }


    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */ 
    public function setDni($dni)
    {
        $this->dni = $dni;

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
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of fecha_nac
     */ 
    public function getFecha_nac()
    {
        return $this->fecha_nac;
    }

    /**
     * Set the value of fecha_nac
     *
     * @return  self
     */ 
    public function setFecha_nac($fecha_nac)
    {
        $this->fecha_nac = $fecha_nac;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
    /**
     * Get the value of baneado
     */ 
    public function getBaneado()
    {
        return $this->baneado;
    }

    /**
     * Set the value of baneado
     *
     * @return  self
     */ 
    public function setBaneado($baneado)
    {
        $this->baneado = $baneado;

        return $this;
    }
    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }
    /**
     * Get the value of contraseña
     */ 
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * Set the value of contraseña
     *
     * @return  self
     */ 
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;

        return $this;
    }
    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }
    
    /**
     * Get the value of reserva
     */ 
    public function getReserva()
    {
        return $this->reserva;
    }

    /**
     * Set the value of reserva
     *
     * @return  self
     */ 
    public function setReserva($reserva)
    {
        $this->reserva = $reserva;

        return $this;
    }
    public function __toString() {
        return "Usuarios: " . $this->getDni() . " - "
            . $this->getNombre() . " - "
            . $this->getApellidos(). " - "
            . $this->getFecha_nac()->format('Y-m-d H:i:s') . " - "
            . $this->getEmail() . " - "
            . $this->getContraseña() . " - "
            . $this->getTelefono() . " - "
            . $this->getBaneado() . " - "
            . $this->getRol() . " - ";
    }

}

