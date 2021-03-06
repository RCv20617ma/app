<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\AgencyTrait;
use AppBundle\Entity\Traits\CreatedByTrait;
use AppBundle\Entity\Traits\UpdatedByTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AbstractContact
 * @package Customer\Entity\Contact
 *
 * @ORM\Entity()
 * @ORM\Table(name="abstract_customer")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorMap(
 *   {
 *     PhysicalCustomer::DISCRIMINATOR = PhysicalCustomer::class,
 *     MoralCustomer::DISCRIMINATOR = MoralCustomer::class,
 *   }
 * )
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbstractCustomerRepository")
 */
abstract class AbstractCustomer
{
    use TimestampableEntity, AgencyTrait, CreatedByTrait, UpdatedByTrait;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @ORM\ManyToOne(targetEntity="ReferenceGender")
     */
    public $gender;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="CustomerPhone", mappedBy="customer", cascade={"persist", "remove"})
     */
    public $phones;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="CustomerEmail", mappedBy="customer", cascade={"persist", "remove"})
     */
    public $emails;

    /**
     * @var bool
     *
     * @ORM\Column(name="archived", type="boolean", nullable=false, options={"default": false})
     */
    public $archived = false;

    /**
     * @ORM\OneToMany(targetEntity="CustomerDocument", mappedBy="customer", cascade={"all"})
     */
    public $documents;

    /**
     * @var bool
     *
     * @ORM\Column(name="address", type="text", nullable=true)
     */
    public $address;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->phones = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->documents = new ArrayCollection();
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
     * Set archived
     *
     * @param boolean $archived
     *
     * @return AbstractCustomer
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return boolean
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Add phone
     *
     * @param \AppBundle\Entity\CustomerPhone $phone
     *
     * @return AbstractCustomer
     */
    public function addPhone(\AppBundle\Entity\CustomerPhone $phone)
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
     * @param \AppBundle\Entity\CustomerPhone $phone
     */
    public function removePhone(\AppBundle\Entity\CustomerPhone $phone)
    {

        $this->phones->removeElement($phone);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Add email
     *
     * @param \AppBundle\Entity\CustomerEmail $email
     *
     * @return AbstractCustomer
     */
    public function addEmail(\AppBundle\Entity\CustomerEmail $email)
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
     * @param \AppBundle\Entity\CustomerEmail $email
     */
    public function removeEmail(\AppBundle\Entity\CustomerEmail $email)
    {
        $this->emails->removeElement($email);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Set gender
     *
     * @param \AppBundle\Entity\ReferenceGender $gender
     *
     * @return AbstractCustomer
     */
    public function setGender(\AppBundle\Entity\ReferenceGender $gender = null)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return \AppBundle\Entity\ReferenceGender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Add document
     *
     * @param \AppBundle\Entity\CustomerDocument $document
     *
     * @return AbstractCustomer
     */
    public function addDocument(\AppBundle\Entity\CustomerDocument $document)
    {
        if (!$this->documents->contains($document)) {
            $document->setCustomer($this);
            $this->documents[] = $document;
        }
        return $this;
    }

    /**
     * Remove document
     *
     * @param \AppBundle\Entity\CustomerDocument $document
     */
    public function removeDocument(\AppBundle\Entity\CustomerDocument $document)
    {
        $this->documents->removeElement($document);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * @return string
     */
    abstract public function getFullName();

    /**
     * @return null|string
     */
    public function getMainEmail()
    {
        foreach ($this->getEmails() as $ec) {
            if ($ec->isMain())
                return $ec->getEmail();
        }
        return $this->getEmails()->isEmpty() ? null : $this->getEmails()->first()->getEmail();
    }

    /**
     * @return null|string
     */
    public function getMainPhone()
    {
        /** @var CustomerPhone $pc */
        foreach ($this->getPhones() as $pc) {
            if ($pc->isMain())
                return $pc->getPhone();
        }
        return $this->getPhones()->isEmpty() ? null : $this->getPhones()->first()->getPhone();

    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return AbstractCustomer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}
