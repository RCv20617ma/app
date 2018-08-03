<?php

namespace AppBundle\Entity;

use AppBundle\Entity\AbstractDocument;
use AppBundle\Entity\File;
use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerDocument
 *
 * @ORM\Table(name="customer_document")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerDocumentRepository")
 */
class CustomerDocument
{
    const DISCRIMINATOR = 'd_customer';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AbstractCustomer", inversedBy="documents")
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity="CustomerDocumentType")
     */
    private $documentType;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\File", cascade={"all"})
     */
    private $file;

    /**
     * CustomerDocument constructor.
     * @param CustomerDocumentType|null $documentType
     */
    public function __construct(CustomerDocumentType $documentType = null)
    {
        $this->documentType = $documentType;
    }

    /**
     * Set customer
     *
     * @param \AppBundle\Entity\AbstractCustomer $customer
     *
     * @return CustomerDocument
     */
    public function setCustomer(\AppBundle\Entity\AbstractCustomer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AppBundle\Entity\AbstractCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set documentType
     *
     * @param \AppBundle\Entity\CustomerDocumentType $documentType
     *
     * @return CustomerDocument
     */
    public function setDocumentType(\AppBundle\Entity\CustomerDocumentType $documentType = null)
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Get documentType
     *
     * @return \AppBundle\Entity\AbstractDocumentType
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Set file
     *
     * @param \AppBundle\Entity\File $file
     *
     * @return CustomerDocument
     */
    public function setFile(File $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \AppBundle\Entity\File
     */
    public function getFile()
    {
        return $this->file;
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
}
