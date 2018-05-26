<?php

/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 26/05/2018
 * Time: 18:51
 */


namespace CarBundle\Manager;

use CoreBundle\Manager\AbstractManager;
use CustomerBundle\Entity\CarMaintenance;

class CarMaintenanceManager extends  AbstractManager
{
	 /**
     * @return mixed
     */
    public function getClass()
    {
        return PhysicalCustomer::class;
    }

    /**
     * @param User $userConnected
     * @return PhysicalCustomer
     */
    public function createByUser(User $userConnected)
    {
        /** @var PhysicalCustomer $physicalCustomer */
        $carMaintenance = parent::create();

        return $carMaintenance;
    }

}
