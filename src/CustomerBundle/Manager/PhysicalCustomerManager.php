<?php
namespace CustomerBundle\Manager;

use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CustomerBundle\Entity\PhysicalCustomer;

/**
 * Class PhysicalCustomerManager
 * @package CustomerBundle\Manager
 */
class PhysicalCustomerManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return PhysicalCustomer::class;
    }

    /**
     * @param Agency $agency
     * @return mixed
     */
    public function getAllByAgency(Agency $agency) {
        return $this->getRepository()->findAllByAgency($agency);
    }


}