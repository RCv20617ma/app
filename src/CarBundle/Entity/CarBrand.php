<?php

namespace CarBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarBrand
 *
 * @ORM\Table(name="car_brand")
 * @ORM\Entity()
 */
class CarBrand extends AbstractReference
{
}
