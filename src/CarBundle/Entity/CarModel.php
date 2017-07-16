<?php

namespace CarBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarModel
 *
 * @ORM\Table(name="car_model")
 * @ORM\Entity()
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="label",
 *          column=@ORM\Column(length=64)
 *      )
 * })
 */
class CarModel extends AbstractReference
{
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
}
