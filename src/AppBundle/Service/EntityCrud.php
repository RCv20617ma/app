<?php

namespace AppBundle\Service;

use CustomerBundle\Manager\PhysicalCustomerManager;
use CarBundle\Manager\CarManager;
use CarBundle\Manager\CarMaintenanceManager;


class EntityCrud
{

    public function getEntityManagerClass()
    {
        return [
            'customer' => PhysicalCustomerManager::class,
            'car' => CarManager::class,
            'carMaintenance' => CarMaintenanceManager::class,
        ];
    }

    function getEntityManagerClassName($entity)
    {
        return $this->getEntityManagerClass()[$entity];
    }
}
