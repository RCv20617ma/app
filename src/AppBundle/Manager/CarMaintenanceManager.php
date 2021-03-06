<?php

/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 26/05/2018
 * Time: 18:51
 */


namespace AppBundle\Manager;

use AppBundle\Manager\AbstractManager;
use AppBundle\Entity\CarMaintenance;
use AppBundle\Entity\Outgo;

class CarMaintenanceManager extends  AbstractManager
{
	 /**
     * @return mixed
     */
    public function getClass()
    {
        return CarMaintenance::class;
    }

    /**
     * @return PhysicalCustomer|mixed
     */
    public function create()
    {
        $carmaintenance= parent::create();
        $carmaintenance->addOutgo(new Outgo());
        return $carmaintenance;
    }
}
