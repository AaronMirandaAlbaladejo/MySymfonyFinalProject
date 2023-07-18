<?php
// \Repository\FooterRepository.php
namespace App\Repository;

use App\Entity\Footer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Footer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Footer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Footer[]    findAll()
 * @method Footer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FooterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Footer::class);
    }

    // /**
    //  * @return Footer[] Returns an array of Footer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Footer
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
	
    public function findByFilaColumna()
    {
		
		
		$em = $this->getEntityManager();

        $consulta = $em->createQuery("SELECT f FROM App:Footer f order by f.fila, f.columna");
      
        return $consulta->getResult();
		
		/*
		return $this->createQueryBuilder('a')
            ->orderBy('a.name', 'ASC')
            ->getQuery()
            ->getResult();
		*/
       
    }
    
}
