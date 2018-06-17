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

    const CIN_CODE = 1;
    const DRIVING_LICENCE_CODE = 2;
    const PASSPORT_CODE = 3;
}
