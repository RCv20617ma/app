<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 24/06/2018
 * Time: 19:16
 */

namespace AppBundle\Manager;

use AppBundle\Entity\Outgo;
use AppBundle\Manager\AbstractManager;
use AppBundle\Entity\Charge;


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
