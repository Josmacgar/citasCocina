<?php
use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository {
    public function findByReserva($idReserva)
    {
        $dql = "SELECT u FROM Usuario u
        JOIN u.reserva r
        WHERE r.idReserva = :idReserva";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('idReserva', $idReserva);
        return $query->getArrayResult();
    }
    
    
}