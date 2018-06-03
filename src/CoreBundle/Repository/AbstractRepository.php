<?php

namespace CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

use CoreBundle\Entity\Agency;

/**
 * Class AbstractRepository
 * @package CoreBundle\Repository
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
        $qb = $this->createQueryBuilder($alias,$indexBy);

        return $qb;
    }
}
