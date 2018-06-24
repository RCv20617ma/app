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
     * @var string
     *
     * @ORM\Column(name="lebelle", type="text")
     */
    public  $lebelle;

    /**
     * Set lebelle
     *
     * @param string $lebelle
     *
     * @return Charge
     */
    public function setLebelle($lebelle)
    {
        $this->lebelle = $lebelle;

        return $this;
    }

    /**
     * Get lebelle
     *
     * @return string
     */
    public function getLebelle()
    {
        return $this->lebelle;
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
