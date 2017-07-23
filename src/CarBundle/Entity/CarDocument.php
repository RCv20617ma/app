<?php

namespace CarBundle\Entity;

use CoreBundle\Entity\AbstractDocument;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarDocument
 *
 * @ORM\Table(name="car_document")
 * @ORM\Entity()
 */
class CarDocument extends AbstractDocument
{
    const DISCRIMINATOR = 'd_car';

    /**
     * @ORM\ManyToOne(targetEntity="AbstractCar", inversedBy="documents")
     */
    private $car;

    /**
     * Set car
     *
     * @param \CarBundle\Entity\AbstractCar $car
     *
     * @return CarDocument
     */
    public function setCar(\CarBundle\Entity\AbstractCar $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \CarBundle\Entity\AbstractCar
     */
    public function getCar()
    {
        return $this->car;
    }
}
