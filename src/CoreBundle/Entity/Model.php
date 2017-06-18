<?php

namespace CoreBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use CoreBundle\Entity\Traits\CodeStrTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Make.
 *
 * @ORM\Table(name="model")
 * @ORM\Entity()
 *
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="label",
 *          column=@ORM\Column(length=64)
 *      )
 * })
 */
class Model extends AbstractReference
{
    use CodeStrTrait;

    /**
     * @ORM\ManyToOne(targetEntity="Make")
     **/
    protected $make;

    /**
     * Set make
     *
     * @param \CoreBundle\Entity\Make $make
     *
     * @return Model
     */
    public function setMake(\CoreBundle\Entity\Make $make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return \CoreBundle\Entity\Make
     */
    public function getMake()
    {
        return $this->make;
    }
}
