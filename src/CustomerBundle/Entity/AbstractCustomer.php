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
     * @ORM\ManyToOne(targetEntity="ReferenceGender")
     */
    protected $gender;

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
     * @ORM\OneToMany(targetEntity="CustomerDocument", mappedBy="customer")
     */
    protected $documents;

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
     * @param \CustomerBundle\Entity\CustomerPhone $phone
     *
     * @return AbstractCustomer
     */
    public function addPhone(\CustomerBundle\Entity\CustomerPhone $phone)
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
    public function removePhone(\CustomerBundle\Entity\CustomerPhone $phone)
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
     * @param \CustomerBundle\Entity\CustomerEmail $email
     *
     * @return AbstractCustomer
     */
    public function addEmail(\CustomerBundle\Entity\CustomerEmail $email)
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
    public function removeEmail(\CustomerBundle\Entity\CustomerEmail $email)
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
     * @param \CustomerBundle\Entity\ReferenceGender $gender
     *
     * @return AbstractCustomer
     */
    public function setGender(\CustomerBundle\Entity\ReferenceGender $gender = null)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return \CustomerBundle\Entity\ReferenceGender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Add document
     *
     * @param \CustomerBundle\Entity\CustomerDocument $document
     *
     * @return AbstractCustomer
     */
    public function addDocument(\CustomerBundle\Entity\CustomerDocument $document)
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * Remove document
     *
     * @param \CustomerBundle\Entity\CustomerDocument $document
     */
    public function removeDocument(\CustomerBundle\Entity\CustomerDocument $document)
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
}
