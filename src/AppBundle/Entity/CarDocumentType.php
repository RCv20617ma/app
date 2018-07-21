<?php

namespace AppBundle\Entity;

use AppBundle\Entity\AbstractDocumentType;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarDocumentType
 *
 * @ORM\Table(name="car_document_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarDocumentTypeRepository")
 */
class CarDocumentType extends AbstractDocumentType
{
    const DISCRIMINATOR = 'car';
}
