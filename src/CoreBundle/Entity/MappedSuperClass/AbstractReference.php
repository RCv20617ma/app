<?php
namespace CoreBundle\Entity\MappedSuperClass;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractReference
 * MappedSuperclass doctrine.
 * @package CoreBundle\Entity\MappedSuperClass
 *
 *
 * @ORM\MappedSuperclass
 * @ORM\EntityListeners({ "CoreBundle\Entity\Listener\ReferenceListener" })
 */
abstract class AbstractReference
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\column(name="label", type="string", length=255)
     */
    protected $label;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function __toString()
    {
        return $this->label;
    }
}
