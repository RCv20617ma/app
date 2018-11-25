<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\AgencyTrait;
use AppBundle\Entity\Traits\CreatedByTrait;
use AppBundle\Entity\Traits\UpdatedByTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use AppBundle\Form\ContractType;
use AppBundle\Manager\ContractManager;
use JMS\Serializer\Annotation as Serializer;

/**
 * Contract
 *
 * @ORM\Table(name="contract")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContractRepository")
 * 
 */
class Contract implements EntityCrudInterface
{
    use AgencyTrait, TimestampableEntity, CreatedByTrait, UpdatedByTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AbstractCustomer")
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AbstractCar")
     */
    private $car;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\PhysicalCustomer")
     * @ORM\JoinTable(name="contract_drivers",
     *      joinColumns={@JoinColumn(name="contract_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="driver_id", referencedColumnName="id")}
     *      )
     */
    private $drivers;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $startKms;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fuelLevel = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $endDate;
    
    /**
     * @var string
     *
     * @ORM\Column(type="integer")
     */
    private $numberDays;

    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=10, scale=2)
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
     * @ORM\Column(type="decimal", precision=10, scale=2,options={"default" : 0})
     */
    private $totalOptions = 0;

    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=10, scale=2,options={"default" : 0})
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
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Contract
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
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
     * @param \AppBundle\Entity\AbstractCustomer $customer
     *
     * @return Contract
     */
    public function setCustomer(\AppBundle\Entity\AbstractCustomer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AppBundle\Entity\AbstractCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set car
     *
     * @param \AppBundle\Entity\Car $car
     *
     * @return Contract
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
     * @param \AppBundle\Entity\PhysicalCustomer $driver
     *
     * @return Contract
     */
    public function addDriver(\AppBundle\Entity\PhysicalCustomer $driver)
    {
        $this->drivers[] = $driver;

        return $this;
    }

    /**
     * Remove driver
     *
     * @param \AppBundle\Entity\PhysicalCustomer $driver
     */
    public function removeDriver(\AppBundle\Entity\PhysicalCustomer $driver)
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

     /**
     * @return string
     */
    public function getFormTypeClassName()
    {
        return ContractType::class;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return 'contract';
    }

    /**
     * @return string
     */
    public function getEntityManagerClassName()
    {
        return ContractManager::class;
    }

    /**
     * @return string
     */
    public function getPreFixView()
    {
        return 'AppBundle:Contract';
    }

    /**
     * Set startKms
     *
     * @param integer $startKms
     *
     * @return Contract
     */
    public function setStartKms($startKms)
    {
        $this->startKms = $startKms;

        return $this;
    }

    /**
     * Get startKms
     *
     * @return integer
     */
    public function getStartKms()
    {
        return $this->startKms;
    }

    /**
     * Set fuelLevel
     *
     * @param integer $fuelLevel
     *
     * @return Contract
     */
    public function setFuelLevel($fuelLevel)
    {
        $this->fuelLevel = $fuelLevel;

        return $this;
    }

    /**
     * Get fuelLevel
     *
     * @return integer
     */
    public function getFuelLevel()
    {
        return $this->fuelLevel;
    }

    /**
     * Set totalOptions
     *
     * @param string $totalOptions
     *
     * @return Contract
     */
    public function setTotalOptions($totalOptions)
    {
        $this->totalOptions = $totalOptions;

        return $this;
    }

    /**
     * Get totalOptions
     *
     * @return string
     */
    public function getTotalOptions()
    {
        return $this->totalOptions;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getId()."";
    }
}
