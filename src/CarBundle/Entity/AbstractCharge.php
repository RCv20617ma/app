<?php

namespace CarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;
use CoreBundle\Entity\Traits\AgencyTrait;
use CoreBundle\Entity\Traits\CreatedByTrait;
use CoreBundle\Entity\Traits\UpdatedByTrait;

use Gedmo\Timestampable\Traits\TimestampableEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractCar
 *
 * @ORM\Entity()
 * @ORM\Table(name="abstract_charge")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorMap(
 *   {
 *     Car::DISCRIMINATOR = CarMaintenance::class,
 *     SlCar::DISCRIMINATOR = Charge::class,
 *   }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
Abstract class AbstractCharge
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
     * @ORM\ManyToOne(targetEntity="\CoreBundle\Entity\File", cascade={"all"})
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
     * @ORM\Column(name="comment", type="text", nullable=true)
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


}
