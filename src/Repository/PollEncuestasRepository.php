<?php

namespace App\Repository;

use App\Entity\PollEncuestas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PollEncuestas>
 * @method PollEncuestas|null find($id, $lockMode = null, $lockVersion = null)
 * @method PollEncuestas|null findOneBy(array $criteria, array $orderBy = null)
 * @method PollEncuestas[]    findAll()
 * @method PollEncuestas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class PollEncuestasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PollEncuestas::class);
    }

    public function findEncuestas()
    {
        $em = $this->getEntityManager();
        
        $query = $em->createQuery('SELECT e FROM App:PollEncuestas e order by e.encuestaId');
        
        
        return( $query->getResult() );
        
    }
    

public function name($id)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery('SELECT e.encuesta FROM App:PollEncuestas e WHERE e.encuestaId = :id');
        $query->setParameter('id', $id);

        return( $query->getResult() );
    }


}