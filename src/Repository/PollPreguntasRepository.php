<?php 

namespace App\Repository;

use App\Entity\PollPreguntas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PollPreguntas>
 * @method PollPreguntas|null find($id, $lockMode = null, $lockVersion = null)
 * @method PollPreguntas|null findOneBy(array $criteria, array $orderBy = null)
 * @method PollPreguntas[]    findAll()
 * @method PollPreguntas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class PollPreguntasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PollPreguntas::class);
    }

    public function findPreguntas()
    {
        $em = $this->getEntityManager();
        
        $query = $em->createQuery('SELECT p FROM App:PollPreguntas p order by p.preguntaId');
        
        
        return( $query->getResult() );
        
    }
    
}