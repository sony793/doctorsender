<?php

namespace App\Repository;

use App\Entity\Sexos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sexos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sexos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sexos[]    findAll()
 * @method Sexos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SexosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sexos::class);
    }

    // /**
    //  * @return Sexos[] Returns an array of Sexos objects
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
    public function findOneBySomeField($value): ?Sexos
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
