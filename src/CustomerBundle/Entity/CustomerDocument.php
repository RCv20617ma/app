<?php

namespace CustomerBundle\Entity;

use CoreBundle\Entity\AbstractDocument;
use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerDocument
 *
 * @ORM\Table(name="customer_document")
 * @ORM\Entity(repositoryClass="CustomerBundle\Repository\CustomerDocumentRepository")
 */
class CustomerDocument extends AbstractDocument
{
    const DISCRIMINATOR = 'd_customer';

    /**
     * @ORM\ManyToOne(targetEntity="AbstractCustomer", inversedBy="documents")
     */
    private $customer;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", nullable=true)
     */
    protected $number;

    /**
     * Set customer
     *
     * @param \CustomerBundle\Entity\AbstractCustomer $customer
     *
     * @return CustomerDocument
     */
    public function setCustomer(\CustomerBundle\Entity\AbstractCustomer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \CustomerBundle\Entity\AbstractCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return CustomerDocument
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
}
