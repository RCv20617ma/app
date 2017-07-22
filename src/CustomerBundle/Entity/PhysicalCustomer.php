<?php

namespace CustomerBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * PhysicalCustomer
 *
 * @ORM\Table(name="physical_customer")
 * @ORM\Entity(repositoryClass="CustomerBundle\Repository\PhysicalCustomerRepository")
 */
class PhysicalCustomer extends AbstractCustomer
{
    const DISCRIMINATOR = 'physical';

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=20)
     */
    private $firstName;

    /**
     * @var string
     *
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

    /**
     * Add document
     *
     * @param \CustomerBundle\Entity\CustomerDocument $document
     *
     * @return PhysicalCustomer
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
