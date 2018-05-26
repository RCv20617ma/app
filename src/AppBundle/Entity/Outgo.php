<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Outgo
 *
 *
 * @ORM\Entity()
 */
class Outgo extends AbstractPayment
{
    const DISCRIMINATOR = 'outgo';



}

