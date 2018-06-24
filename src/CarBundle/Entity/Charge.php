<?php

namespace CarBundle\Entity;

use CarBundle\Form\CarType;
use CarBundle\Manager\CarManager;
use CoreBundle\Entity\EntityCrudInterface;

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
