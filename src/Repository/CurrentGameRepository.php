<?php

namespace App\Repository;

use App\Entity\CurrentGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CurrentGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrentGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrentGame[]    findAll()
 * @method CurrentGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrentGameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CurrentGame::class);
    }

    // /**
    //  * @return CurrentGame[] Returns an array of CurrentGame objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CurrentGame
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
