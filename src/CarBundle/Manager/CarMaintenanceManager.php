<?php

/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 26/05/2018
 * Time: 18:51
 */


namespace CarBundle\Manager;

use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\CarMaintenance;

class CarMaintenanceManager extends  AbstractManager
{
	 /**
     * @return mixed
     */
    public function getClass()
    {
        return CarMaintenance::class;
    }
}
