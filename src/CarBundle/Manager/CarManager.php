<?php

namespace CarBundle\Manager;

use CarBundle\Entity\Car;
use CoreBundle\Manager\AbstractManager;

/**
 * Class CarManager
 * @package CarBundle\Manager
 */
class CarManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return Car::class;
    }
}
