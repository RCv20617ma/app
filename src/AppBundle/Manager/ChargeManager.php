<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Outgo;
use CoreBundle\Manager\AbstractManager;
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
