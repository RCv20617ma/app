<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Traits\AgencyTrait;
use AppBundle\Entity\Traits\CreatedByTrait;
use AppBundle\Entity\Traits\UpdatedByTrait;
use AppBundle\Entity\Charge;
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
 *     CarMaintenance::DISCRIMINATOR = CarMaintenance::class,
 *     Charge::DISCRIMINATOR = Charge::class,
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
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\File", cascade={"all"})
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
     * @param \AppBundle\Entity\File $File
     *
     * @return CarMaintenance
     */
    public function setFile(\AppBundle\Entity\File $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \AppBundle\Entity\File
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
