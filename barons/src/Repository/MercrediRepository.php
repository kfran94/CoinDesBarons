<?php

namespace App\Repository;

use App\Entity\Mercredi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mercredi>
 *
 * @method Mercredi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mercredi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mercredi[]    findAll()
 * @method Mercredi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MercrediRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mercredi::class);
    }

//    /**
//     * @return Mercredi[] Returns an array of Mercredi objects
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

//    public function findOneBySomeField($value): ?Mercredi
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
