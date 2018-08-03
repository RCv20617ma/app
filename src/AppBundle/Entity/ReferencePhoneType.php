<?php

namespace AppBundle\Entity;

use AppBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class ReferencePhoneType.
 *
 * @ORM\Table(name="reference_phone_type")
 * @ORM\Entity()
 *
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="label",
 *          column=@ORM\Column(length=64)
 *      )
 * })
 */
class ReferencePhoneType extends AbstractReference
{
}
