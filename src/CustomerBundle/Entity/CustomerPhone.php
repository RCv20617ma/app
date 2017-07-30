<?php

namespace CustomerBundle\Entity;

use CoreBundle\Entity\ReferencePhoneType;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Class CustomerPhone
 * @package Iad\Bundle\MyIadBundle\Entity\Contact
 *
 * @ORM\Table(name="customer_phone")
 * @ORM\Entity()
 *
 */
class CustomerPhone
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var AbstractCustomer
     *
     * @ORM\ManyToOne(targetEntity="AbstractCustomer", inversedBy="phones")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
     */
    private $customer;

    /**
     * @var string
     * @ORM\Column(name="phone", type="phone_number", length=64)
     */
    private $phone;

    /**
     * @var ReferencePhoneType
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\ReferencePhoneType")
     * @ORM\JoinColumn(name="ref_phone_type_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_main", type="boolean", nullable=false, options={"default" : false})
     */
    private $main = false;

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
     * Set phone
     *
     * @param phone_number $phone
     *
     * @return AbstractCustomer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return phone_number
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set main
     *
     * @param boolean $main
     *
     * @return AbstractCustomerPhone
     */
    public function setMain($main)
    {
        $this->main = $main;

        return $this;
    }

    /**
     * Is Main
     *
     * @return bool
     */
    public function isMain()
    {
        return $this->main;
    }

    /**
     * Set customer
     *
     * @param \CustomerBundle\Entity\AbstractCustomer $customer
     *
     * @return AbstractCustomerPhone
     */
    public function setCustomer(\CustomerBundle\Entity\AbstractCustomer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \CustomerBundle\Entity\AbstractCustomer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set type
     *
     * @param \CoreBundle\Entity\ReferencePhoneType $type
     *
     * @return AbstractCustomerPhone
     */
    public function setType(\CoreBundle\Entity\ReferencePhoneType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \CoreBundle\Entity\ReferencePhoneType
     */
    public function getType()
    {
        return $this->type;
    }
}
