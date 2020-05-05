<?php

namespace App\Repository;

use App\Entity\ScenarioTeamProgression;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScenarioTeamProgression|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScenarioTeamProgression|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScenarioTeamProgression[]    findAll()
 * @method ScenarioTeamProgression[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScenarioTeamProgressionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScenarioTeamProgression::class);
    }

    // /**
    //  * @return ScenarioTeamProgression[] Returns an array of ScenarioTeamProgression objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ScenarioTeamProgression
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
