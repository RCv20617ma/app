<?php
namespace CustomerBundle\Manager;

use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CustomerBundle\Entity\AbstractCustomer;

/**
 * Class AbstractCustomerManager
 * @package CustomerBundle\Manager
 */
class AbstractCustomerManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return AbstractCustomer::class;
    }

    /**
     * @param Agency $agency
     * @param null $key
     * @return mixed
     */
    public function getAllByAgency(Agency $agency,$key = null) {
        return $this->getRepository()->findAllByAgency($agency,$key);
    }


}