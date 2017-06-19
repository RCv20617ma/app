<?php

namespace CoreBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use CoreBundle\Entity\Traits\AgencyTrait;
use CoreBundle\Entity\Traits\CodeStrTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Make.
 *
 * @ORM\Table(name="make")
 * @ORM\Entity()
 *
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="label",
 *          column=@ORM\Column(length=64)
 *      )
 * })
 */
class Make extends AbstractReference
{
    use CodeStrTrait;
}
