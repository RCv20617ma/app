<?php

namespace AppBundle\Entity;

use AppBundle\Entity\MappedSuperClass\AbstractReference;
use AppBundle\Entity\Traits\CodeIntTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractDocumentType
 *
 * @ORM\Table(name="abstract_document_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbstractDocumentTypeRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorMap(
 *   {
 *     AppBundle\Entity\CarDocumentType::DISCRIMINATOR = AppBundle\Entity\CarDocumentType::class,
 *     AppBundle\Entity\CustomerDocumentType::DISCRIMINATOR = AppBundle\Entity\CustomerDocumentType::class,
 *   }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
abstract class AbstractDocumentType extends AbstractReference
{
    use CodeIntTrait;
}
