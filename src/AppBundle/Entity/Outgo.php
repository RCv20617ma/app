<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Outgo
 *
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OutgoRepository")
 */
class Outgo extends AbstractPayment
{
    const DISCRIMINATOR = 'outgo';



}

