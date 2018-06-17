<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agency
 *
 * @ORM\Table(name="agency")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\AgencyRepository")
 */
class Agency
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=64, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=8)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="phone_number", length=32, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=true)
     */
    private $email;

    /**
     * @var float
     *
     * @ORM\Column(name="tva", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $tva;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="trade_register_number", type="string", length=32, nullable=true)
     */
    private $tradeRegisterNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cnss_number", type="string", length=32, nullable=true)
     */
    private $cnssNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="id_fiscal_number", type="string", length=32, nullable=true)
     */
    private $idFiscalNumber;


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
     * Set name
     *
     * @param string $name
     *
     * @return Agency
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Agency
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return Agency
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return Agency
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Agency
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tva
     *
     * @param float $tva
     *
     * @return Agency
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return float
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Agency
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Agency
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

    /**
     * Set tradeRegisterNumber
     *
     * @param string $tradeRegisterNumber
     *
     * @return Agency
     */
    public function setTradeRegisterNumber($tradeRegisterNumber)
    {
        $this->tradeRegisterNumber = $tradeRegisterNumber;

        return $this;
    }

    /**
     * Get tradeRegisterNumber
     *
     * @return string
     */
    public function getTradeRegisterNumber()
    {
        return $this->tradeRegisterNumber;
    }

    /**
     * Set cnssNumber
     *
     * @param string $cnssNumber
     *
     * @return Agency
     */
    public function setCnssNumber($cnssNumber)
    {
        $this->cnssNumber = $cnssNumber;

        return $this;
    }

    /**
     * Get cnssNumber
     *
     * @return string
     */
    public function getCnssNumber()
    {
        return $this->cnssNumber;
    }

    /**
     * Set idFiscaleNumber
     *
     * @param string $idFiscaleNumber
     *
     * @return Agency
     */
    public function setIdFiscaleNumber($idFiscaleNumber)
    {
        $this->idFiscaleNumber = $idFiscaleNumber;

        return $this;
    }

    /**
     * Get idFiscalNumber
     *
     * @return string
     */
    public function getIdFiscalNumber()
    {
        return $this->idFiscalNumber;
    }

    /**
     * Set idFiscalNumber
     *
     * @param string $idFiscalNumber
     *
     * @return Agency
     */
    public function setIdFiscalNumber($idFiscalNumber)
    {
        $this->idFiscalNumber = $idFiscalNumber;

        return $this;
    }

    /**
     * Set phone
     *
     * @param phone_number $phone
     *
     * @return Agency
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return phone_number
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
