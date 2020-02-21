<?php

namespace App\Repository;

use App\Entity\ConnectedObject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ConnectedObject|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConnectedObject|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConnectedObject[]    findAll()
 * @method ConnectedObject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConnectedObjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConnectedObject::class);
    }

    // /**
    //  * @return ConnectedObject[] Returns an array of ConnectedObject objects
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
    public function findOneBySomeField($value): ?ConnectedObject
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
