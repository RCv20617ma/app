<?php

namespace CarBundle\Entity;

use CoreBundle\Entity\AbstractDocumentType;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarDocumentType
 *
 * @ORM\Table(name="car_document_type")
 * @ORM\Entity(repositoryClass="CarBundle\Repository\CarDocumentTypeRepository")
 */
class CarDocumentType extends AbstractDocumentType
{
    const DISCRIMINATOR = 'car';
}
