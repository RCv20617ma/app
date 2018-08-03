<?php
namespace AppBundle\Manager;

use AppBundle\Entity\Agency;
use AppBundle\Manager\AbstractManager;
use AppBundle\Entity\AbstractCustomer;

/**
 * Class AbstractCustomerManager
 * @package AppBundle\Manager
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