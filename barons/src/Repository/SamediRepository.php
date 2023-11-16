<?php

namespace App\Repository;

use App\Entity\Samedi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Samedi>
 *
 * @method Samedi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Samedi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Samedi[]    findAll()
 * @method Samedi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SamediRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Samedi::class);
    }

//    /**
//     * @return Samedi[] Returns an array of Samedi objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Samedi
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
