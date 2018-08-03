<?php

namespace AppBundle\Service;

use AppBundle\Manager\PhysicalCustomerManager;
use AppBundle\Manager\CarManager;
use AppBundle\Manager\ChargeManager;
use AppBundle\Manager\CarMaintenanceManager;
use AppBundle\Manager\ContractManager;


class EntityCrud
{

    public function getEntityManagerClass()
    {
        return [
            'customer' => PhysicalCustomerManager::class,
            'car' => CarManager::class,
            'car_maintenance' => CarMaintenanceManager::class,
            'charge' => ChargeManager::class,
            'contract' => ContractManager::class,
        ];
    }

    function getEntityManagerClassName($entity)
    {
        return $this->getEntityManagerClass()[$entity];
    }
}
