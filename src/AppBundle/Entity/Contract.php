<?php

namespace AppBundle\Entity;

use CoreBundle\Entity\Traits\AgencyTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Contract
 *
 * @ORM\Table(name="contract")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContractRepository")
 */
class Contract
{
    use AgencyTrait,TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="CustomerBundle\Entity\AbstractCustomer")
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity="CarBundle\Entity\AbstractCar")
     */
    private $car;

    /**
     * @ORM\ManyToMany(targetEntity="CustomerBundle\Entity\PhysicalCustomer")
     *  @ORM\JoinTable(name="contract_drivers",
     *      joinColumns={@JoinColumn(name="contract_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="driver_id", referencedColumnName="id")}
     *      )
     */
    private $drivers;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetimetz")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetimetz")
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $originalPriceDay;

    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $priceDay;

    /**
     * @var string
     *
     * @ORM\Column(name="number_days", type="integer")
     */
    private $numberDays;
    
    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total;

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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Contract
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Contract
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set customer
     *
     * @param \CustomerBundle\Entity\AbstractCustomer $customer
     *
     * @return Contract
     */
    public function setCustomer(\CustomerBundle\Entity\AbstractCustomer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \CustomerBundle\Entity\AbstractCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return Contract
     */
    public function setCar(\CarBundle\Entity\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \CarBundle\Entity\Car
     */
    public function getCar()
    {
        return $this->car;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->drivers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set priceDay
     *
     * @param string $priceDay
     *
     * @return Contract
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
     * Set numberDays
     *
     * @param integer $numberDays
     *
     * @return Contract
     */
    public function setNumberDays($numberDays)
    {
        $this->numberDays = $numberDays;

        return $this;
    }

    /**
     * Get numberDays
     *
     * @return integer
     */
    public function getNumberDays()
    {
        return $this->numberDays;
    }

    /**
     * Add driver
     *
     * @param \CustomerBundle\Entity\PhysicalCustomer $driver
     *
     * @return Contract
     */
    public function addDriver(\CustomerBundle\Entity\PhysicalCustomer $driver)
    {
        $this->drivers[] = $driver;

        return $this;
    }

    /**
     * Remove driver
     *
     * @param \CustomerBundle\Entity\PhysicalCustomer $driver
     */
    public function removeDriver(\CustomerBundle\Entity\PhysicalCustomer $driver)
    {
        $this->drivers->removeElement($driver);
    }

    /**
     * Get drivers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDrivers()
    {
        return $this->drivers;
    }

    /**
     * Set originalPriceDay
     *
     * @param string $originalPriceDay
     *
     * @return Contract
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
     * Set total
     *
     * @param string $total
     *
     * @return Contract
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }
}
