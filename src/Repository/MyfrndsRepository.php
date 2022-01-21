<?php

namespace App\Repository;

use App\Entity\Myfrnds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Myfrnds|null find($id, $lockMode = null, $lockVersion = null)
 * @method Myfrnds|null findOneBy(array $criteria, array $orderBy = null)
 * @method Myfrnds[]    findAll()
 * @method Myfrnds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MyfrndsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Myfrnds::class);
    }

    // /**
    //  * @return Myfrnds[] Returns an array of Myfrnds objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Myfrnds
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
