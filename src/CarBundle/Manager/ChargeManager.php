<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 24/06/2018
 * Time: 19:16
 */

namespace CarBundle\Manager;

use CarBundle\Entity\Charge;
use CoreBundle\Manager\AbstractManager;


class ChargeManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return ChargeManager::class;
    }
}
