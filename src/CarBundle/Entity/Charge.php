<?php

namespace CarBundle\Entity;


use CoreBundle\Entity\EntityCrudInterface;
use CarBundle\Form\ChargeType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Car
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
     * @param \CarBundle\Entity\TypeCharge $typeCharge
     *
     * @return Charge
     */
    public function setTypeCharge(\CarBundle\Entity\TypeCharge $typeCharge = null)
    {
        $this->typeCharge = $typeCharge;

        return $this;
    }

    /**
     * Get typeCharge
     *
     * @return \CarBundle\Entity\TypeCharge
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
        return 'CarBundle:Charge';
    }

}
