<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 24/06/2018
 * Time: 19:16
 */

namespace CarBundle\Manager;

use AppBundle\Entity\Outgo;
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

    /**
     * @return Charge
     */
    public function create()
    {
        /** @var Charge $charge */
        $charge = parent::create();
        $charge->addOutgo(new Outgo());

        return $charge;
    }
}
