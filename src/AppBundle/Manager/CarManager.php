<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Car;
use AppBundle\Manager\AbstractManager;

/**
 * Class CarManager
 * @package AppBundle\Manager
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
