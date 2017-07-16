<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\CarRepository")
 */
class Car extends AbstractCar
{
    const DISCRIMINATOR = 'l';

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=16, nullable=true)
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $currentKm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $purchaseDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $saleDate;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $horsePower;

    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $priceDay;

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
     * Set saleDate
     *
     * @param \DateTime $saleDate
     *
     * @return Car
     */
    public function setSaleDate($saleDate)
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    /**
     * Get saleDate
     *
     * @return \DateTime
     */
    public function getSaleDate()
    {
        return $this->saleDate;
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
}
