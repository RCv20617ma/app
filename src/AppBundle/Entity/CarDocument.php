<?php

namespace AppBundle\Entity;

use AppBundle\Entity\AbstractDocument;
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
     * @param \AppBundle\Entity\AbstractCar $car
     *
     * @return CarDocument
     */
    public function setCar(\AppBundle\Entity\AbstractCar $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \AppBundle\Entity\AbstractCar
     */
    public function getCar()
    {
        return $this->car;
    }
}
