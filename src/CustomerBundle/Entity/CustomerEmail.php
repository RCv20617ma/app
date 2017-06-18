<?php

namespace CustomerBundle\Entity;

use CustomerBundle\Entity\AbstractCustomer;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Class CustomerEmail
 * @package CoreBundle\Entity
 *
 * @ORM\Table(name="customer_email")
 * @ORM\Entity()
 */
class CustomerEmail
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var AbstractCustomer
     *
     * @ORM\ManyToOne(targetEntity="AbstractCustomer", inversedBy="phones")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
     */
    protected $customer;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=128)
     */
    protected $email;

    /**
     * @var ReferencePhoneType
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\ReferenceEmailType")
     * @ORM\JoinColumn(name="ref_email_type_id", referencedColumnName="id")
     */
    protected $type;

    /**
     * @var bool
     *
     * @ORM\Column(name="main", type="boolean", nullable=false, options={"default" : false})
     */
    protected $main = false;

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
     * Set email
     *
     * @param string $email
     *
     * @return AbstractCustomerEmail
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set main
     *
     * @param boolean $main
     *
     * @return AbstractCustomerEmail
     */
    public function setMain($main)
    {
        $this->main = $main;

        return $this;
    }

    /**
     * Get main
     *
     * @return boolean
     */
    public function getMain()
    {
        return $this->main;
    }

    /**
     * Set customer
     *
     * @param \CustomerBundle\Entity\AbstractCustomer $customer
     *
     * @return AbstractCustomerEmail
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
     * @param \CoreBundle\Entity\ReferenceEmailType $type
     *
     * @return AbstractCustomerEmail
     */
    public function setType(\CoreBundle\Entity\ReferenceEmailType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \CoreBundle\Entity\ReferenceEmailType
     */
    public function getType()
    {
        return $this->type;
    }
}
