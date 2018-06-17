<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Outgo
 * @package AppBundle\Entity
 *
 * @ORM\Entity()
 */
class Outgo extends AbstractPayment
{
    const DISCRIMINATOR = 'outgo';
}

