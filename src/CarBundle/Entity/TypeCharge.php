<?php
/**
 * Created by PhpStorm.
 * User: noureddine
 * Date: 03/07/2018
 * Time: 23:31
 */

namespace CarBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 *  TypeCharge
 *
 * @ORM\Table(name="charge_type")
 * @ORM\Entity()
 */
class TypeCharge
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Label", type="string", length=255)
     */
    private $label ;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return TypeCharge
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

     public function __toString()
    {
        return sprintf('%s', $this->getLabel());
    }
}
