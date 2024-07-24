<?php

namespace App\Repository;

use App\Entity\Stars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Stars>
 */
class Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stars::class);
    }

   /**
    * @return Stars[] Returns an array of Stars objects
    */
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('l')
           ->andWhere('l.exampleField = :val')
           ->setParameter('val', $value)
           ->orderBy('l.id', 'ASC')
           ->setMaxResults(10)
           ->getQuery()
           ->getResult();
    }

    public function findOneBySomeField($value): ?Stars{
        return $this
        ->createQueryBuilder('l')
        ->andWhere('l.exampleField = :val')
        ->setParameter('val', $value)
        ->getQuery()
        ->getOneOrNullResult();
    }
}