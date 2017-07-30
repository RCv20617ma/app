<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\Agency;

/**
 * AbstractRepository
 *
 * This class was created by Abdelhak. Add your own custom
 * repository methods below.
 */
Abstract class AbstractRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * @param Agency $agency
     * @param $alias
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function filterByAgency(Agency $agency,$alias)
    {
        $qb = $this->createQueryBuilder($alias)
            ->join($alias.'.agency', 'ag', 'WITH', 'ag.id = :agencyId')
            ->setParameter('agencyId', $agency->getId());

        return $qb;
    }

}
