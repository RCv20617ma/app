<?php

namespace AppBundle\Service;


use CustomerBundle\Manager\PhysicalCustomerManager;
use CarBundle\Manager\CarMaintenanceManager;

class EntityCrud {

    public function getEntityManagerClass() {
     return [
         'customer' => PhysicalCustomerManager::class,
     ];
    }

    public function getEntityManager($entity) {

        return $this->getEntityManagerClass()[$entity];
    }
}
