<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Film>
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

    /**
     * @return Film[] Returns an array of Film objects
     */
    public function findByExampleField(string $value): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.title = :val')  // Assuming you want to filter by title
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function findOneBySomeField(string $value): ?Film
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.title = :val')  // Assuming you want to filter by title
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
