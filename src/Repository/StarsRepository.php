<?php

namespace App\Repository;

use App\Entity\Stars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Stars>
 */
class StarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stars::class);
    }

    /**
     * @return Stars[] Returns an array of Stars objects
     */
    public function findByExampleField(string $value): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.name = :val')  // Assuming you want to filter by name
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function findOneBySomeField(string $value): ?Stars
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.name = :val')  // Assuming you want to filter by name
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
