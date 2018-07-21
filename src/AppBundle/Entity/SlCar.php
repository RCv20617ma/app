<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SlCar
 *
 * @ORM\Table(name="sl_car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SlCarRepository")
 */
class SlCar extends AbstractCar
{
    const DISCRIMINATOR = 'sl';

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agency")
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
     * @param \AppBundle\Entity\Agency $ownerAgency
     *
     * @return SlCar
     */
    public function setOwnerAgency(\AppBundle\Entity\Agency $ownerAgency)
    {
        $this->ownerAgency = $ownerAgency;

        return $this;
    }

    /**
     * Get ownerAgency
     *
     * @return \AppBundle\Entity\Agency
     */
    public function getOwnerAgency()
    {
        return $this->ownerAgency;
    }
}
