<?php

namespace App\Repository;

use App\Entity\Spa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Spa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Spa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Spa[]    findAll()
 * @method Spa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Spa::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Spa $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Spa $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }


    // /**
    //  * @return Spa[] Returns an array of Spa objects
    //  */

    public function search()
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.annonce ', 'a')
            ->orderBy('a.DateDeMiseAjour', 'DESC')
            ->getQuery()
            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Spa
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
