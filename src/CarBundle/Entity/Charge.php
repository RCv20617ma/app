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
     * @ORM\Column(name="libelle", type="text")
     */
    public  $libelle;

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Charge
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
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
