<?php

namespace App\Repository;

use App\Entity\PollRespuestas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PollRespuestas>
 * @method PollRespuestas|null find($id, $lockMode = null, $lockVersion = null)
 * @method PollRespuestas|null findOneBy(array $criteria, array $orderBy = null)
 * @method PollRespuestas[]    findAll()
 * @method PollRespuestas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class PollRespuestasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PollRespuestas::class);
    }

    public function findRespuestas()
    {
        $em = $this->getEntityManager();
        
        $query = $em->createQuery('SELECT r FROM App:PollRespuestas r order by r.respuestaId');
        
        
        return( $query->getResult() );
        
    }
    
}