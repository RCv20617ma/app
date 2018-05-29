<?php

namespace CarBundle\Entity;

use CarBundle\Form\SlCarType;
use CustomerBundle\Manager\SLCarManager;
use Doctrine\ORM\Mapping as ORM;

/**
 * SlCar
 *
 * @ORM\Table(name="sl_car")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\SlCarRepository")
 */
class SlCar extends AbstractCar
{
    const DISCRIMINATOR = 'sl';

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Agency")
     * @ORM\JoinColumn(name="owner_agency_id", referencedColumnName="id", nullable=false)
     **/
    private $ownerAgency;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=16)
     */
    private $carNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $originalPriceDay;

    /**
     * Set carNumber
     *
     * @param string $carNumber
     *
     * @return SlCar
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
     * Set originalPriceDay
     *
     * @param string $originalPriceDay
     *
     * @return SlCar
     */
    public function setOriginalPriceDay($originalPriceDay)
    {
        $this->originalPriceDay = $originalPriceDay;

        return $this;
    }

    /**
     * Get originalPriceDay
     *
     * @return string
     */
    public function getOriginalPriceDay()
    {
        return $this->originalPriceDay;
    }

    /**
     * Set ownerAgency
     *
     * @param \CoreBundle\Entity\Agency $ownerAgency
     *
     * @return SlCar
     */
    public function setOwnerAgency(\CoreBundle\Entity\Agency $ownerAgency)
    {
        $this->ownerAgency = $ownerAgency;

        return $this;
    }

    /**
     * Get ownerAgency
     *
     * @return \CoreBundle\Entity\Agency
     */
    public function getOwnerAgency()
    {
        return $this->ownerAgency;
    }

    /**
     * Set brand
     *
     * @param \CarBundle\Entity\CarBrand $brand
     *
     * @return SlCar
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

    /**
     * {@inheritdoc}
     */
    public function getFormType() {
        return SlCarType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'sl_car';
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityManager()
    {
        return SLCarManager::class;
    }

    /**
     * @return string
     */
    public function getPreFixView()
    {
        return 'SlCar';
    }
}
