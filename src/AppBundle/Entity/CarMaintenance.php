<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\EntityCrudInterface;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Form\CarMaintenanceType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CarMaintenance
 *
 * @ORM\Table(name="car_maintenance")
 * @ORM\Entity()
 */
class CarMaintenance extends AbstractCharge implements EntityCrudInterface
{

    const DISCRIMINATOR = 'cm';

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Car")
     */
    private $car;


    /**
     * @ORM\ManyToOne(targetEntity="TypeMaintenance")
     */
    private $typeMaintenance;

    /**
     * Set car
     *
     * @param \AppBundle\Entity\Car $car
     *
     * @return CarMaintenance
     */
    public function setCar(\AppBundle\Entity\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \AppBundle\Entity\Car
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set typeMaintenance
     *
     * @param \AppBundle\Entity\TypeMaintenance $typeMaintenance
     *
     * @return CarMaintenance
     */
    public function setTypeMaintenance(\AppBundle\Entity\TypeMaintenance $typeMaintenance = null)
    {
        $this->typeMaintenance = $typeMaintenance;

        return $this;
    }

    /**
     * Get typeMaintenance
     *
     * @return \AppBundle\Entity\TypeMaintenance
     */
    public function getTypeMaintenance()
    {
        return $this->typeMaintenance;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormTypeClassName()
    {
        return CarMaintenanceType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'car_maintenance';
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityManagerClassName()
    {
        return CarMaintenanceManager::class;
    }

    /**
     * @return string
     */
    public function getPreFixView()
    {
        return 'AppBundle:CarMaintenance';
    }

    public function __toString()
    {
        return sprintf('%s', $this->getTypeMaintenance());
    }
}
