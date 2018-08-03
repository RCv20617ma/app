<?php

namespace AppBundle\Entity;

use AppBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Mapping as ORM;

/**
 * ReferenceCarOption
 *
 * @ORM\Table(name="reference_gender")
 * @ORM\Entity()
 */
class ReferenceGender extends AbstractReference
{
}
