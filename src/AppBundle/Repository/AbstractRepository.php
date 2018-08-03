<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

use AppBundle\Entity\Agency;

/**
 * Class AbstractRepository
 * @package AppBundle\Repository
 */
abstract class AbstractRepository extends EntityRepository
{
    /**
     * @param Agency $agency
     * @param $alias
     * @param null $indexBy
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function filterByAgency(Agency $agency,$alias, $indexBy = null)
    {
        $qb = $this->createQueryBuilder($alias,$indexBy)
            ->join($alias.'.agency', 'ag', 'WITH', 'ag.id = :agencyId')
            ->setParameter('agencyId', $agency->getId());

        return $qb;
    }
}
