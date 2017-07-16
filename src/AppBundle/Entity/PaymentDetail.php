<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentDetail
 *
 * @ORM\Table(name="payment_detail")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaymentDetailRepository")
 */
class PaymentDetail
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
     * @ORM\Column(name="card_holder", type="string", length=64, nullable=true)
     */
    private $cardHolder;

    /**
     * @var int
     *
     * @ORM\Column(name="cvv_code", type="smallint", nullable=true)
     */
    private $cvvCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiry_date", type="datetime", nullable=true)
     */
    private $expiryDate;
    
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
     * Set cardHolder
     *
     * @param string $cardHolder
     *
     * @return PaymentDetail
     */
    public function setCardHolder($cardHolder)
    {
        $this->cardHolder = $cardHolder;

        return $this;
    }

    /**
     * Get cardHolder
     *
     * @return string
     */
    public function getCardHolder()
    {
        return $this->cardHolder;
    }

    /**
     * Set cvvCode
     *
     * @param integer $cvvCode
     *
     * @return PaymentDetail
     */
    public function setCvvCode($cvvCode)
    {
        $this->cvvCode = $cvvCode;

        return $this;
    }

    /**
     * Get cvvCode
     *
     * @return int
     */
    public function getCvvCode()
    {
        return $this->cvvCode;
    }

    /**
     * Set expiryDate
     *
     * @param \DateTime $expiryDate
     *
     * @return PaymentDetail
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * Get expiryDate
     *
     * @return \DateTime
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }
}
