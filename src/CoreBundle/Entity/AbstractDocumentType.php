<?php

namespace CoreBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use CoreBundle\Entity\Traits\CodeIntTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractDocumentType
 *
 * @ORM\Table(name="abstract_document_type")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\AbstractDocumentTypeRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorMap(
 *   {
 *     CarBundle\Entity\CarDocumentType::DISCRIMINATOR = CarBundle\Entity\CarDocumentType::class,
 *     CustomerBundle\Entity\CustomerDocumentType::DISCRIMINATOR = CustomerBundle\Entity\CustomerDocumentType::class,
 *   }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
abstract class AbstractDocumentType extends AbstractReference
{
    use CodeIntTrait;
}
