<?php

namespace App\Repository;

use App\Entity\Fluide;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fluide>
 *
 * @method Fluide|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fluide|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fluide[]    findAll()
 * @method Fluide[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FluideRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fluide::class);
    }

//    /**
//     * @return Fluide[] Returns an array of Fluide objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Fluide
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
