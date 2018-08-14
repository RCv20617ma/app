<?php

namespace AppBundle\Entity;

use AppBundle\Form\CarType;
use AppBundle\Manager\CarManager;
use AppBundle\Entity\EntityCrudInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarRepository")
 * @Serializer\ExclusionPolicy("ALL")
 */
class Car extends AbstractCar implements EntityCrudInterface
{
    const DISCRIMINATOR = 'l';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=16, nullable=true)
     * @Assert\NotBlank()
     */
    private $carNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=16, unique=true)
     */
    private $carNumberWW;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @ORM\Column(type="integer")
     * @Serializer\Expose
     */
    private $currentKm;

    /**
     * @var \DateTime
     *
     * @Assert\Date()
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $purchaseDate;

    /**
     * @var \DateTime
     *
     * @Assert\Date()
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $saleDatePlanned;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $horsePower;

    /**
     * @var string
     * @Assert\Range(min = 0)
     * @ORM\Column(type="decimal", precision=10, scale=2)
     * @Serializer\Expose
     */
    private $priceDay;

    /**
     * Car constructor.
     */
    public function __construct()
    {
        $this->purchaseDate = new \DateTime();
    }


    /**
     * Set carNumber
     *
     * @param string $carNumber
     *
     * @return Car
     */
    public function setCarNumber($carNumber)
    {
        $this->carNumber = $carNumber;

        return $this;
    }

    /**
     * Get carNumber
     *
     * @return string
     */
    public function getCarNumber()
    {
        return $this->carNumber;
    }

    /**
     * Set carNumberWW
     *
     * @param string $carNumberWW
     *
     * @return Car
     */
    public function setCarNumberWW($carNumberWW)
    {
        $this->carNumberWW = $carNumberWW;

        return $this;
    }

    /**
     * Get carNumberWW
     *
     * @return string
     */
    public function getCarNumberWW()
    {
        return $this->carNumberWW;
    }

    /**
     * Set currentKm
     *
     * @param integer $currentKm
     *
     * @return Car
     */
    public function setCurrentKm($currentKm)
    {
        $this->currentKm = $currentKm;

        return $this;
    }

    /**
     * Get currentKm
     *
     * @return int
     */
    public function getCurrentKm()
    {
        return $this->currentKm;
    }

    /**
     * Set purchaseDate
     *
     * @param \DateTime $purchaseDate
     *
     * @return Car
     */
    public function setPurchaseDate($purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    /**
     * Get purchaseDate
     *
     * @return \DateTime
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * Set saleDatePlanned
     *
     * @param \DateTime $saleDatePlanned
     *
     * @return Car
     */
    public function setSaleDatePlanned($saleDatePlanned)
    {
        $this->saleDatePlanned = $saleDatePlanned;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getSaleDatePlanned()
    {
        return $this->saleDatePlanned;
    }

    /**
     * Set horsePower
     *
     * @param integer $horsePower
     *
     * @return Car
     */
    public function setHorsePower($horsePower)
    {
        $this->horsePower = $horsePower;

        return $this;
    }

    /**
     * Get horsePower
     *
     * @return int
     */
    public function getHorsePower()
    {
        return $this->horsePower;
    }

    /**
     * Set priceDay
     *
     * @param string $priceDay
     *
     * @return Car
     */
    public function setPriceDay($priceDay)
    {
        $this->priceDay = $priceDay;

        return $this;
    }

    /**
     * Get priceDay
     *
     * @return string
     */
    public function getPriceDay()
    {
        return $this->priceDay;
    }

    /**
     * Set brand
     *
     * @param \AppBundle\Entity\CarBrand $brand
     *
     * @return Car
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

    public function __toString()
    {
        return sprintf('%s %s - %s', $this->getBrand(), $this->getModel(), $this->getCarNumber());
    }


    /**
     * @return string
     */
    public function getFormTypeClassName()
    {
        return CarType::class;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return 'car';
    }

    /**
     * @return string
     */
    public function getEntityManagerClassName()
    {
        return CarManager::class;
    }

    /**
     * @return string
     */
    public function getPreFixView()
    {
        return 'AppBundle:Car';
    }
}
