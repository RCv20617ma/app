<?php

namespace CustomerBundle\Entity;

use CoreBundle\Entity\Traits\AgencyTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;

/**
 * Class AbstractContact
 * @package Customer\Entity\Contact
 *
 * @ORM\Entity()
 * @ORM\Table(name="abstract_customer")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap(
 *   {
 *     PhysicalCustomer::DISCRIMINATOR = PhysicalCustomer::class,
 *     MoralCustomer::DISCRIMINATOR = MoralCustomer::class,
 *   }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
abstract class AbstractCustomer
{
    use TimestampableEntity, AgencyTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="CustomerPhone", mappedBy="customer", cascade={"persist", "remove"})
     */
    protected $phones;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="CustomerEmail", mappedBy="customer", cascade={"persist", "remove"})
     */
    protected $emails;

    /**
     * @var bool
     *
     * @ORM\Column(name="archived", type="boolean", nullable=false, options={"default": false})
     */
    protected $archived;

    /**
     * Constructor
     */
    protected function __construct()
    {
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    protected function getId()
    {
        return $this->id;
    }

    /**
     * Set archived
     *
     * @param boolean $archived
     *
     * @return AbstractCustomer
     */
    protected function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return boolean
     */
    protected function getArchived()
    {
        return $this->archived;
    }

    /**
     * Add phone
     *
     * @param \CustomerBundle\Entity\CustomerPhone $phone
     *
     * @return AbstractCustomer
     */
    protected function addPhone(\CustomerBundle\Entity\CustomerPhone $phone)
    {
        if (!$this->phones->contains($phone)) {
            $phone->setCustomer($this);
            $this->phones[] = $phone;
        }

        return $this;
    }

    /**
     * Remove phone
     *
     * @param \CustomerBundle\Entity\CustomerPhone $phone
     */
    protected function removePhone(\CustomerBundle\Entity\CustomerPhone $phone)
    {
        $this->phones->removeElement($phone);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    protected function getPhones()
    {
        return $this->phones;
    }

    /**
     * Add email
     *
     * @param \CustomerBundle\Entity\CustomerEmail $email
     *
     * @return AbstractCustomer
     */
    protected function addEmail(\CustomerBundle\Entity\CustomerEmail $email)
    {
        if (!$this->emails->contains($email)) {
            $email->setCustomer($this);
            $this->emails[] = $email;
        }

        return $this;
    }

    /**
     * Remove email
     *
     * @param \CustomerBundle\Entity\CustomerEmail $email
     */
    protected function removeEmail(\CustomerBundle\Entity\CustomerEmail $email)
    {
        $this->emails->removeElement($email);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    protected function getEmails()
    {
        return $this->emails;
    }
}
