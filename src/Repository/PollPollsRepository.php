<?php

namespace App\Repository;
use App\Entity\PollPolls;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PollPolls>
 * @method PollPolls|null find($id, $lockMode = null, $lockVersion = null)
 * @method PollPolls|null findOneBy(array $criteria, array $orderBy = null)
 * @method PollPolls[]    findAll()
 * @method PollPolls[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PollPollsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PollPolls::class);
    }

    public function findPolls()
    {
        $em = $this->getEntityManager();
        
        $query = $em->createQuery('SELECT p FROM App:PollPolls p order by p.pollId');
        
        
        return( $query->getResult() );
        
    }
    
}