<?php

namespace App\Repository;

use App\Entity\MaxReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MaxReservation>
 *
 * @method MaxReservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaxReservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaxReservation[]    findAll()
 * @method MaxReservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaxReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaxReservation::class);
    }

//    /**
//     * @return MaxReservation[] Returns an array of MaxReservation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MaxReservation
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
