<?php

namespace App\Repository;

use App\Entity\Photos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Photos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Photos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Photos[]    findAll()
 * @method Photos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Photos::class);
    }

    public function findRandomImage(){
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findImage($idcategorie){
        return $this->createQueryBuilder('p')
            ->where('p.categories ='.$idcategorie)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findImageTech($idcategorie){
        return $this->createQueryBuilder('p')
            ->where('p.techniques ='.$idcategorie)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findImagePhotographe($idcategorie){
        return $this->createQueryBuilder('p')
            ->where('p.photographe ='.$idcategorie)
            ->getQuery()
            ->getResult()
            ;
    }
    // /**
    //  * @return Photos[] Returns an array of Photos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Photos
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
