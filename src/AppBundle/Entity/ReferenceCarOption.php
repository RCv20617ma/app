<?php

namespace AppBundle\Entity;

use AppBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarOption
 *
 * @ORM\Table(name="reference_car_option")
 * @ORM\Entity()
 */
class ReferenceCarOption extends AbstractReference
{
}
