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
}
