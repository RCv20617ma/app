<?php
namespace CarBundle\Manager;

use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\CarBrand;

/**
 * Class CarBrandManager
 * @package CarBundle\Manager
 */
class CarBrandManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return CarBrand::class;
    }




}