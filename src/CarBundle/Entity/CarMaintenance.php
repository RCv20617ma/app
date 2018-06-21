<?php

namespace CarBundle\Entity;

use CoreBundle\Entity\Traits\AgencyTrait;
use CoreBundle\Entity\Traits\CreatedByTrait;
use CoreBundle\Entity\Traits\UpdatedByTrait;
use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Entity\EntityCrudInterface;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;
use CarBundle\Form\CarMaintenanceType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CarMaintenance
 *
 * @ORM\Table(name="car_maintenance")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\CarMaintenanceRepository")
 */
class CarMaintenance implements EntityCrudInterface
{

    use CreatedByTrait, UpdatedByTrait, TimestampableEntity, AgencyTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="TypeMaintenance")
     */
    private $typeMaintenance;


    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Car")
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity="\CoreBundle\Entity\File")
     */
    protected $file;

    /**
     * @var int
     *
     * @Assert\NotBlank()
     * @Assert\Range(min = 0)
     * @ORM\Column(name="amount", type="decimal",precision=10, scale=2)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @Assert\Date()
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Outgo", cascade={"all"} )
     */
    private $outgo;

    public function __construct()
    {
        $this->outgo = new ArrayCollection();
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
     * Set amount
     *
     * @param string $amount
     *
     * @return CarMaintenance
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return CarMaintenance
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return CarMaintenance
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Set typeMaintenance
     *
     * @param \CarBundle\Entity\TypeMaintenance $typeMaintenance
     *
     * @return CarMaintenance
     */
    public function setTypeMaintenance(\CarBundle\Entity\TypeMaintenance $typeMaintenance = null)
    {
        $this->typeMaintenance = $typeMaintenance;

        return $this;
    }

    /**
     * Get typeMaintenance
     *
     * @return \CarBundle\Entity\TypeMaintenance
     */
    public function getTypeMaintenance()
    {
        return $this->typeMaintenance;
    }

    /**
     * Set typeMaintenance
     *
     * @param \CoreBundle\Entity\File $File
     *
     * @return CarMaintenance
     */
    public function setFile(\CoreBundle\Entity\File $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \CoreBundle\Entity\File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set car
     *
     * @param \CarBundle\Entity\Car $car
     *
     * @return CarMaintenance
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
     * Add outgo
     *
     * @param \AppBundle\Entity\Outgo $outgo
     * @return CarMaintenance
     */
    public function addOutgo(\AppBundle\Entity\Outgo $outgo)
    {
        $this->outgo->add($outgo);
        return $this;
    }

    /**
     * Remove outgo
     *
     * @param \AppBundle\Entity\Outgo $outgo
     */
    public function removeOutgo(\AppBundle\Entity\Outgo $outgo)
    {
        $this->outgo->removeElement($outgo);
    }

    /**
     * Get CarMaintenance
     *
     * @return
     */
    public function getOutgo()
    {
        return $this->outgo;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormTypeClassName()
    {
        return CarMaintenanceType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'car_maintenance';
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityManagerClassName()
    {
        return CarMaintenanceManager::class;
    }

    /**
     * @return string
     */
    public function getPreFixView()
    {
        return 'CarBundle:CarMaintenance';
    }

    public function __toString()
    {
        return sprintf('%s', $this->getTypeMaintenance());
    }
}
