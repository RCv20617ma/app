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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
