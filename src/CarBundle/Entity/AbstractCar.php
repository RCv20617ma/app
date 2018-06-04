<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

use CoreBundle\Entity\Traits\AgencyTrait;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractCar
 *
 * @ORM\Entity(repositoryClass="CarBundle\Repository\AbstractCarRepository")
 * @ORM\Table(name="abstract_car")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorMap(
 *   {
 *     Car::DISCRIMINATOR = Car::class,
 *     SlCar::DISCRIMINATOR = SlCar::class,
 *   }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
Abstract class AbstractCar
{
    use AgencyTrait,TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="CarModel")
     */
    protected $model;

    /**
     * @ORM\ManyToOne(targetEntity="CarBrand")
     */
    protected $brand;

    /**
     * @ORM\ManyToMany(targetEntity="ReferenceCarOption")
     * @ORM\JoinTable(name="abstract_car_option",
     *      joinColumns={@JoinColumn(name="car_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="option_id", referencedColumnName="id")}
     *      )
     */
    protected $options;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="ReferenceFuelType")
     */
    protected $fuelType;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="ReferenceGearBox")
     */
    protected $gearbox;

    /**
     * @ORM\OneToMany(targetEntity="CarDocument", mappedBy="car")
     */
    protected $documents;


    /**
     * @ORM\OneToMany(targetEntity="CarMaintenance", mappedBy="car")
     */
    protected $carMaintenance;

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
        $this->options = new ArrayCollection();
        $this->carMaintenance = new ArrayCollection();
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
     * @return mixed
     */
    public function getGearbox()
    {
        return $this->gearbox;
    }

    /**
     * @param $gearbox
     * @return $this
     */
    public function setGearbox($gearbox)
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    /**
     * Add document
     *
     * @param \CarBundle\Entity\CarDocument $document
     *
     * @return AbstractCar
     */
    public function addDocument(\CarBundle\Entity\CarDocument $document)
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param \CarBundle\Entity\CarDocument $document
     */
    public function removeDocument(\CarBundle\Entity\CarDocument $document)
    {
        $this->documents->removeElement($document);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }

<<<<<<< HEAD

    /**
     * Add carMaintenance
     *
     * @param \CarBundle\Entity\CarMaintenance $CarMaintenance
     *
     * @return \CarBundle\Entity\CarMaintenance
     */
    public function addCarMaintenance(\CarBundle\Entity\CarMaintenance $CarMaintenance)
    {
        $this->CarMaintenance[] = $CarMaintenance;
=======
    /**
     * Set brand
     *
     * @param \CarBundle\Entity\CarBrand $brand
     *
     * @return AbstractCar
     */
    public function setBrand(\CarBundle\Entity\CarBrand $brand = null)
    {
        $this->brand = $brand;
>>>>>>> master

        return $this;
    }

    /**
<<<<<<< HEAD
     * Remove CarMaintenance
     *
     * @param \CarBundle\Entity\CarDocument $CarMaintenance
     */
    public function removeCarMaintenance(\CarBundle\Entity\CarMaintenance $CarMaintenance)
    {
        $this->CarMaintenance->removeElement($CarMaintenance);
    }



    /**
     * Get carMaintenance
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarMaintenance()
    {
        return $this->carMaintenance;
=======
     * Get brand
     *
     * @return \CarBundle\Entity\CarBrand
     */
    public function getBrand()
    {
        return $this->brand;
>>>>>>> master
    }
}
