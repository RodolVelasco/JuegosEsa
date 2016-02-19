<?php

namespace PD\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{
	public function findUsuarios()
	{
			
		$em = $this->getEntityManager();

        $consulta = $em->createQuery('
            SELECT u
            FROM PDBundle:Usuario u
            WHERE 1 = 1
        ');
        
        return $consulta->getResult();
	}
}