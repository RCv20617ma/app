<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaymentRepository")
 */
class Payment extends  AbstractPayment
{

    const DISCRIMINATOR = 'payment';
    
    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\ReferenceModePayment")
     */
    private $modePayment;

    /**
     * @var PaymentDetail
     *
     * @ORM\OneToOne(targetEntity="PaymentDetail", cascade={"persist", "remove"}, orphanRemoval=true )
     */
    private $detail;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal", precision=10, scale=2)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=64, nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=true)
     */
    private $note;

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
     * Set amount
     *
     * @param string $amount
     *
     * @return Payment
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Payment
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
     * Set number
     *
     * @param string $number
     *
     * @return Payment
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Payment
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set modePayment
     *
     * @param \CoreBundle\Entity\ReferenceModePayment $modePayment
     *
     * @return Payment
     */
    public function setModePayment(\CoreBundle\Entity\ReferenceModePayment $modePayment = null)
    {
        $this->modePayment = $modePayment;

        return $this;
    }

    /**
     * Get modePayment
     *
     * @return \CoreBundle\Entity\ReferenceModePayment
     */
    public function getModePayment()
    {
        return $this->modePayment;
    }

    /**
     * Set detail
     *
     * @param \AppBundle\Entity\PaymentDetail $detail
     *
     * @return Payment
     */
    public function setDetail(\AppBundle\Entity\PaymentDetail $detail = null)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return \AppBundle\Entity\PaymentDetail
     */
    public function getDetail()
    {
        return $this->detail;
    }
}
