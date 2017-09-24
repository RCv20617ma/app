<?php

namespace CustomerBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * PhysicalCustomer
 *
 * @ORM\Table(name="physical_customer")
 * @ORM\Entity(repositoryClass="CustomerBundle\Repository\PhysicalCustomerRepository")
 * @UniqueEntity(
 *     fields={"firstName", "lastName", "agency"},
 *     errorPath="lastName",
 *     message="customer.name_already_used"
 * )
 */
class PhysicalCustomer extends AbstractCustomer
{
    const DISCRIMINATOR = 'physical';
    const DEFAULT_NATIONALITY = 'MA';


    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=32)
     * @Assert\NotBlank()
     * @Assert\Length(min = 2, max = 30)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=32)
     * @Assert\NotBlank()
     * @Assert\Length(min = 2, max = 30)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="date", nullable=true)
     * @Assert\Date()
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="nationality", type="string", length=4,  nullable=false)
     * @Assert\Country()
     */
    private $nationality;

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
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     * @return PhysicalCustomer
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getFullName()
    {
        return $this->getLastName().' '.$this->getFirstName();
    }
}
