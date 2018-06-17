<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaintenanceType
 *
 * @ORM\Table(name="maintenance_type")
 * @ORM\Entity()
 */
class TypeMaintenance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Label", type="string", length=255)
     */
    private $label ;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return TypeMaintenance
     */
    public function setLabel($label)
    {
        $this->label  = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel ()
    {
        return $this->label ;
    }

    public function __toString()
    {
        return sprintf('%s', $this->getLabel());
    }
}

