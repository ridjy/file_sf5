<?php

namespace App\Repository;

use App\Entity\ClientsAPV;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClientsAPV>
 *
 * @method ClientsAPV|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientsAPV|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientsAPV[]    findAll()
 * @method ClientsAPV[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientsAPVRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientsAPV::class);
    }

    public function save(ClientsAPV $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ClientsAPV $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function testDoublon($value): ?ClientsAPV
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.VIN = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
