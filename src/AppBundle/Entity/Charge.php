<?php

namespace AppBundle\Entity;


use CoreBundle\Entity\EntityCrudInterface;
use AppBundle\Form\ChargeType;
use CarBundle\Entity\AbstractCharge;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Charge
 *
 * @ORM\Table(name="charge")
 * @ORM\Entity()
 */
class Charge extends AbstractCharge implements EntityCrudInterface
{
    const DISCRIMINATOR = 'c';

    /**
     * @ORM\ManyToOne(targetEntity="TypeCharge")
     */
     private $typeCharge;

    /**
     * Set typeCharge
     *
     * @param \AppBundle\Entity\TypeCharge $typeCharge
     *
     * @return Charge
     */
    public function setTypeCharge(\AppBundle\Entity\TypeCharge $typeCharge = null)
    {
        $this->typeCharge = $typeCharge;

        return $this;
    }

    /**
     * Get typeCharge
     *
     * @return \AppBundle\Entity\TypeCharge
     */
    public function getTypeCharge()
    {
        return $this->typeCharge;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormTypeClassName()
    {
        return ChargeType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getSlug()
    {
        return 'charge';
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityManagerClassName()
    {
        return ChargeManager::class;
    }

    /**
     * @return string
     */
    public function getPreFixView()
    {
        return 'AppBundle:Charge';
    }
    public function __toString()
    {
        return sprintf('%s', $this->getTypeCharge());
    }

}
