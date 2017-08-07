<?php

namespace CustomerBundle\Repository;
use CoreBundle\Entity\Agency;
use CoreBundle\Repository\AbstractRepository;

/**
 * PhysicalCustomerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PhysicalCustomerRepository extends AbstractRepository
{

    /**
     * @param Agency $agency
     * @return array
     */
    public function findAllByAgency(Agency $agency) {
        return $this->filterByAgency($agency,'pc')->getQuery()->getResult();
    }


}
