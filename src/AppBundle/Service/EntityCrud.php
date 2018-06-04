<?php

namespace AppBundle\Service;

use CustomerBundle\Manager\PhysicalCustomerManager;
use CarBundle\Manager\CarManager;

class EntityCrud
{

    public function getEntityManagerClass()
    {
        return [
            'customer' => PhysicalCustomerManager::class,
            'car' => CarManager::class,
        ];
    }

    public function getEntityManagerClassName($entity)
    {

        return $this->getEntityManagerClass()[$entity];
    }
}
