<?php

namespace CustomerBundle\Entity;

use CoreBundle\Entity\AbstractDocumentType;
use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerDocumentType
 *
 * @ORM\Table(name="customer_document_type")
 * @ORM\Entity(repositoryClass="CustomerBundle\Repository\CustomerDocumentTypeRepository")
 */
class CustomerDocumentType extends AbstractDocumentType
{
    const DISCRIMINATOR = 'customer';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
