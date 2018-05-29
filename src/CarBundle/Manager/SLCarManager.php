<?php
namespace CarBundle\Manager;

use AppBundle\Entity\User;
use CarBundle\Entity\SlCar;
use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CustomerBundle\Entity\CustomerEmail;
use CustomerBundle\Entity\CustomerPhone;
use CustomerBundle\Entity\PhysicalCustomer;

/**
 * Class PhysicalCustomerManager
 * @package CustomerBundle\Manager
 */
class SLCarManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return SlCar::class;
    }

    /**
     * @param User $userConnected
     * @return SlCar
     */
    public function createByUser(User $userConnected)
    {
        $slcar = parent::create();

        return $slcar;
    }


}