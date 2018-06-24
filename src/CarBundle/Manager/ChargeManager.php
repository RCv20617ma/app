<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 24/06/2018
 * Time: 19:16
 */

namespace CarBundle\Manager;

use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\Charge;


class ChargeManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return Charge::class;
    }
}
