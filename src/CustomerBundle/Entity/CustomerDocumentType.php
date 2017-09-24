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

    const CIN_LABEL = 'customer_document_type.CIN';
    const DRIVING_LICENCE_LABEL = 'customer_document_type.DRIVING_LICENCE';
    const PASSPORT_LABEL = 'customer_document_type.PASSPORT';
}
