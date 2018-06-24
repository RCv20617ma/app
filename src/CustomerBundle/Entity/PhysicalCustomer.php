<?php

namespace CustomerBundle\Entity;

use CoreBundle\Entity\EntityCrudInterface;
use CustomerBundle\Form\PhysicalCustomerType;
use CustomerBundle\Manager\PhysicalCustomerManager;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * PhysicalCustomer
 *
 * @ORM\Table(name="physical_customer")
 * @ORM\Entity(repositoryClass="CustomerBundle\Repository\PhysicalCustomerRepository")
 */
class PhysicalCustomer extends AbstractCustomer implements EntityCrudInterface
{
    const DISCRIMINATOR = 'physical';

    /**
     * @ORM\ManyToOne(targetEntity="CustomerDocumentType")
     */
    private $identityDocumentType;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=64)
     */
    private $identityNumber;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=64)
     */
    private $drivingLicenceNumber;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=64)
     */
    private $nationality;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="first_name", type="string", length=20)
     */
    private $firstName;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="last_name", type="string", length=20)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="date", nullable=true)
     * @Assert\Date
     */
    private $birthDate;

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return PhysicalCustomer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return PhysicalCustomer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return PhysicalCustomer
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set gender
     *
     * @param \CustomerBundle\Entity\ReferenceGender $gender
     *
     * @return PhysicalCustomer
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

    public function getFullName()
    {
        return $this->getLastName() . ' ' . $this->getFirstName();
    }

    /**
     * {@inheritdoc}
     */
    public function getFormTypeClassName()
    {
        return PhysicalCustomerType::class;
    }

    public function __toString()
    {
        return $this->getFullName();
    }


    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityManagerClassName()
    {
        return PhysicalCustomerManager::class;
    }

    /**
     * @return string
     */
    public function getPreFixView()
    {
        return 'CustomerBundle:Customer';
    }

    /**
     * Set identityNumber
     *
     * @param string $identityNumber
     *
     * @return PhysicalCustomer
     */
    public function setIdentityNumber($identityNumber)
    {
        $this->identityNumber = $identityNumber;

        return $this;
    }

    /**
     * Get identityNumber
     *
     * @return string
     */
    public function getIdentityNumber()
    {
        return $this->identityNumber;
    }

    /**
     * Set drivingLicenceNumber
     *
     * @param string $drivingLicenceNumber
     *
     * @return PhysicalCustomer
     */
    public function setDrivingLicenceNumber($drivingLicenceNumber)
    {
        $this->drivingLicenceNumber = $drivingLicenceNumber;

        return $this;
    }

    /**
     * Get drivingLicenceNumber
     *
     * @return string
     */
    public function getDrivingLicenceNumber()
    {
        return $this->drivingLicenceNumber;
    }

    /**
     * Set identityDocumentType
     *
     * @param \CustomerBundle\Entity\CustomerDocumentType $identityDocumentType
     *
     * @return PhysicalCustomer
     */
    public function setIdentityDocumentType(\CustomerBundle\Entity\CustomerDocumentType $identityDocumentType = null)
    {
        $this->identityDocumentType = $identityDocumentType;

        return $this;
    }

    /**
     * Get identityDocumentType
     *
     * @return \CustomerBundle\Entity\CustomerDocumentType
     */
    public function getIdentityDocumentType()
    {
        return $this->identityDocumentType;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     *
     * @return PhysicalCustomer
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }
}

