<?php

namespace AppBundle\Entity;

use AppBundle\Entity\MappedSuperClass\AbstractReference;
use AppBundle\Entity\Traits\CodeIntTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * ModePayment
 *
 * @ORM\Table(name="reference_mode_payment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModePaymentRepository")
 */
class ReferenceModePayment extends AbstractReference
{
    use CodeIntTrait;
}
