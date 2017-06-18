<?php

namespace CoreBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use CoreBundle\Entity\Traits\CodeIntTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * ModePayment
 *
 * @ORM\Table(name="reference_mode_payment")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ModePaymentRepository")
 */
class ReferenceModePayment extends AbstractReference
{
    use CodeIntTrait;
}
