<?php

namespace AppBundle\Service;

use CarBundle\Entity\Car;
use CustomerBundle\Manager\PhysicalCustomerManager;
use CarBundle\Manager\SLCarManager;

class EntityCrud {


    public function getEntityManagerClass() {
     return [
         'customer' => PhysicalCustomerManager::class,
         'sl_car' => SLCarManager::class,
     ];
    }

    public function getEntityManager($entity) {

        return $this->getEntityManagerClass()[$entity];
    }
}
