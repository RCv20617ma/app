<?php

namespace CarBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarModel
 *
 * @ORM\Table(name="car_model")
 * @ORM\Entity()
 */
class CarModel
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\column(type="string", length=64)
     */
    protected $label;

    /**
     * @ORM\ManyToOne(targetEntity="CarBrand")
     */
    private $brand;

    /**
     * Set brand
     *
     * @param \CarBundle\Entity\CarBrand $brand
     *
     * @return CarModel
     */
    public function setBrand(\CarBundle\Entity\CarBrand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \CarBundle\Entity\CarBrand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return CarModel
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getLabel();
    }
}
