<?php
use Doctrine\ORM\EntityRepository;

class PlatosRepository extends EntityRepository {
    public function findPLatos($idReserva)
    {
        $dql = "SELECT p FROM Platos p
        JOIN p.reserva r
        WHERE r.idReserva = :idReserva";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('idReserva', $idReserva);
        return $query->getArrayResult();
    }
 
}