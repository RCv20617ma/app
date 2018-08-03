<?php

namespace AppBundle\Entity;

use AppBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarOption
 *
 * @ORM\Table(name="reference_fuel_type")
 * @ORM\Entity()
 */
class ReferenceFuelType extends AbstractReference
{
}
