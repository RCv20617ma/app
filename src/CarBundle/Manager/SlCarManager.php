<?php
namespace CarBundle\Manager;

use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\SlCar;

/**
 * Class SlCarManager
 * @package CarBundle\Manager
 */
class SlCarManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return SlCar::class;
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