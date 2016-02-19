<?php

namespace PD\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class LibretaRepository extends EntityRepository
{

    public function findListaLibretas()
    {
        $em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT l
            FROM PDBundle:Libreta l
            ORDER BY l.correlativo
        ');
        $consulta->useResultCache(true, 3600);

        return $consulta->getArrayResult();
    }

    public function findByNextLibreta($posicion) {
        $qb = $this->createQueryBuilder('l');
        $qb->leftJoin('l.caja', 'c')
           ->where('l.vendedor is NULL')
           ->orderBy('c.fecha_creacion', 'DESC');
        $results = $qb->getQuery()->getResult();
        if(sizeof($results) > 0 ){
            return $results[$posicion];
        }else{
            return NULL;
        }
    }
}
