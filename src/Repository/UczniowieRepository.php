<?php

namespace App\Repository;

use App\Entity\Uczniowie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Uczniowie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uczniowie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uczniowie[]    findAll()
 * @method Uczniowie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UczniowieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Uczniowie::class);
    }

    // /**
    //  * @return Uczniowie[] Returns an array of Uczniowie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uczniowie
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
