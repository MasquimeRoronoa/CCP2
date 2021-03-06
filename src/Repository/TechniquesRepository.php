<?php

namespace App\Repository;

use App\Entity\Techniques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Techniques|null find($id, $lockMode = null, $lockVersion = null)
 * @method Techniques|null findOneBy(array $criteria, array $orderBy = null)
 * @method Techniques[]    findAll()
 * @method Techniques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechniquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Techniques::class);
    }

    public function findTechniques(int $idphoto){
        return $this->createQueryBuilder('p')
            ->where('p.id = '.$idphoto)
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return Techniques[] Returns an array of Techniques objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Techniques
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
