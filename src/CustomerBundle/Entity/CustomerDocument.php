<?php

namespace CustomerBundle\Entity;

use CoreBundle\Entity\AbstractDocument;
use CoreBundle\Entity\File;
use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerDocument
 *
 * @ORM\Table(name="customer_document")
 * @ORM\Entity(repositoryClass="CustomerBundle\Repository\CustomerDocumentRepository")
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
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\File", cascade={"all"})
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
     * Set documentType
     *
     * @param \CustomerBundle\Entity\CustomerDocumentType $documentType
     *
     * @return CustomerDocument
     */
    public function setDocumentType(\CustomerBundle\Entity\CustomerDocumentType $documentType = null)
    {
        $this->documentType = $documentType;

        return $this;
    }

    /**
     * Get documentType
     *
     * @return \CustomerBundle\Entity\AbstractDocumentType
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Set file
     *
     * @param \CoreBundle\Entity\File $file
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
     * @return \CustomerBundle\Entity\File
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
