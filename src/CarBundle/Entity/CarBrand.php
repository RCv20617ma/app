<?php

namespace CarBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarBrand
 *
 * @ORM\Table(name="car_brand")
 * @ORM\Entity()
 */
class CarBrand
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
     * @ORM\OneToMany(targetEntity="CarModel", mappedBy="brand")
     */
    private $models;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->models = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add model
     *
     * @param \CarBundle\Entity\CarModel $model
     *
     * @return CarBrand
     */
    public function addModel(\CarBundle\Entity\CarModel $model)
    {
        $this->models[] = $model;

        return $this;
    }

    /**
     * Remove model
     *
     * @param \CarBundle\Entity\CarModel $model
     */
    public function removeModel(\CarBundle\Entity\CarModel $model)
    {
        $this->models->removeElement($model);
    }

    /**
     * Get models
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModels()
    {
        return $this->models;
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
     * @return CarBrand
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
