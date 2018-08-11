<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Traits\AgencyTrait;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractCar
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbstractCarRepository")
 * @ORM\Table(name="abstract_car")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorMap(
 *   {
 *     Car::DISCRIMINATOR = Car::class,
 *     SlCar::DISCRIMINATOR = SlCar::class,
 *   }
 * )
 * @ORM\HasLifecycleCallbacks()
 * @Serializer\ExclusionPolicy("ALL")
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
     * @param \AppBundle\Entity\CarDocument $document
     *
     * @return AbstractCar
     */
    public function addDocument(\AppBundle\Entity\CarDocument $document)
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param \AppBundle\Entity\CarDocument $document
     */
    public function removeDocument(\AppBundle\Entity\CarDocument $document)
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

    /**
     * Set brand
     *
     * @param \AppBundle\Entity\CarBrand $brand
     *
     * @return AbstractCar
     */
    public function setBrand(\AppBundle\Entity\CarBrand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \AppBundle\Entity\CarBrand
     */
    public function getBrand()
    {
        return $this->brand;
    }
}
