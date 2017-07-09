<?php

namespace CarBundle\Entity;

use CoreBundle\Entity\Traits\AgencyTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;

/**
 * Class AbstractCar
 *
 * @ORM\Entity(repositoryClass="CarBundle\Repository\AbstractCarRepository")
 * @ORM\Table(name="abstract_car")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\HasLifecycleCallbacks()
 */
class AbstractCar
{
    use AgencyTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="CarModel")
     */
    private $model;

    /**
     * @ORM\ManyToMany(targetEntity="ReferenceCarOption")
     *  @ORM\JoinTable(name="abstract_car_option",
     *      joinColumns={@JoinColumn(name="car_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="option_id", referencedColumnName="id")}
     *      )
     */
    private $options;

    /**
     * @ORM\ManyToOne(targetEntity="ReferenceFuelType")
     */
    private $fuelType;

    /**
     * @ORM\ManyToOne(targetEntity="ReferenceGearBox")
     */
    private $gearBox;

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
     * Constructor
     */
    public function __construct()
    {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set model
     *
     * @param CarModel $model
     *
     * @return AbstractCar
     */
    public function setModel(CarModel $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return CarModel
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Add option
     *
     * @param ReferenceCarOption $option
     *
     * @return AbstractCar
     */
    public function addOption(ReferenceCarOption $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * Remove option
     *
     * @param ReferenceCarOption $option
     */
    public function removeOption(ReferenceCarOption $option)
    {
        $this->options->removeElement($option);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set fuelType
     *
     * @param ReferenceFuelType $fuelType
     *
     * @return AbstractCar
     */
    public function setFuelType(ReferenceFuelType $fuelType = null)
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    /**
     * Get fuelType
     *
     * @return ReferenceFuelType
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * Set gearBox
     *
     * @param ReferenceGearBox $gearBox
     *
     * @return AbstractCar
     */
    public function setGearBox(ReferenceGearBox $gearBox = null)
    {
        $this->gearBox = $gearBox;

        return $this;
    }

    /**
     * Get gearBox
     *
     * @return ReferenceGearBox
     */
    public function getGearBox()
    {
        return $this->gearBox;
    }
}
