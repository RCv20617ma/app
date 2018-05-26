<?php

namespace AppBundle\Service;

use CarBundle\Entity\Car;
use CustomerBundle\Manager\PhysicalCustomerManager;

class EntityCrud {


    public function getEntityManagerClass() {
     return [
         'car' => Car::class,
         'customer' => PhysicalCustomerManager::class,
     ];
    }

    public function getEntityManager($entity) {

        return $this->getEntityManagerClass()[$entity];
    }

}