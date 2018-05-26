<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CarMaintenance
 *
 * @ORM\Table(name="car_maintenance")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\CarMaintenanceRepository")
 */
class CarMaintenance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="AbstractCar", inversedBy="carMaintenance")
     */
    private $car;


    /**
     * @var int
     *
     * @ORM\Column(name="numeroReglement", type="integer")
     */
    private $numeroReglement;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="remarque", type="text")
     */
    private $remarque;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMaintenance", type="datetime")
     */
    private $dateMaintenance;

    /**
     * @var string
     *
     * @ORM\Column(name="typeReglement", type="string", length=255)
     */
    private $typeReglement;


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
     * Set numeroReglement
     *
     * @param integer $numeroReglement
     *
     * @return CarMaintenance
     */
    public function setNumeroReglement($numeroReglement)
    {
        $this->numeroReglement = $numeroReglement;

        return $this;
    }

    /**
     * Get numeroReglement
     *
     * @return int
     */
    public function getNumeroReglement()
    {
        return $this->numeroReglement;
    }

    /**
     * Set montant
     *
     * @param integer $montant
     *
     * @return CarMaintenance
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set remarque
     *
     * @param string $remarque
     *
     * @return CarMaintenance
     */
    public function setRemarque($remarque)
    {
        $this->remarque = $remarque;

        return $this;
    }

    /**
     * Get remarque
     *
     * @return string
     */
    public function getRemarque()
    {
        return $this->remarque;
    }

    /**
     * Set dateMaintenance
     *
     * @param \DateTime $dateMaintenance
     *
     * @return CarMaintenance
     */
    public function setDateMaintenance($dateMaintenance)
    {
        $this->dateMaintenance = $dateMaintenance;

        return $this;
    }

    /**
     * Get dateMaintenance
     *
     * @return \DateTime
     */
    public function getDateMaintenance()
    {
        return $this->dateMaintenance;
    }

    /**
     * Set typeReglement
     *
     * @param string $typeReglement
     *
     * @return CarMaintenance
     */
    public function setTypeReglement($typeReglement)
    {
        $this->typeReglement = $typeReglement;

        return $this;
    }

    /**
     * Get typeReglement
     *
     * @return string
     */
    public function getTypeReglement()
    {
        return $this->typeReglement;
    }

     /**
     * Set car
     *
     * @param \CarBundle\Entity\Car $car
     * @return \CarBundle\Entity\Car
     */
    public function setCar(Car $car)
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
}
