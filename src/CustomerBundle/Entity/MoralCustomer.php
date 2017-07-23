<?php

namespace CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MoralCustomer
 *
 * @ORM\Table(name="moral_customer")
 * @ORM\Entity(repositoryClass="CustomerBundle\Repository\MoralCustomerRepository")
 */
class MoralCustomer extends AbstractCustomer
{
    const DISCRIMINATOR = 'moral';

    /**
     * @var string
     *
     * @ORM\Column(name="social_reason", type="string", length=255,nullable=true)
     */
    private $socialReason;

    /**
     * @var string
     *
     * @ORM\Column(name="manager_name", type="string", length=64, nullable=true)
     */
    private $managerName;

    /**
     * @var string
     *
     * @ORM\Column(name="web_site", type="string", length=64, nullable=true)
     */
    private $webSite;

    /**
     * Set socialReason
     *
     * @param string $socialReason
     *
     * @return MoralCustomer
     */
    public function setSocialReason($socialReason)
    {
        $this->socialReason = $socialReason;

        return $this;
    }

    /**
     * Get socialReason
     *
     * @return string
     */
    public function getSocialReason()
    {
        return $this->socialReason;
    }

    /**
     * Set managerName
     *
     * @param string $managerName
     *
     * @return MoralCustomer
     */
    public function setManagerName($managerName)
    {
        $this->managerName = $managerName;

        return $this;
    }

    /**
     * Get managerName
     *
     * @return string
     */
    public function getManagerName()
    {
        return $this->managerName;
    }

    /**
     * Set webSite
     *
     * @param string $webSite
     *
     * @return MoralCustomer
     */
    public function setWebSite($webSite)
    {
        $this->webSite = $webSite;

        return $this;
    }

    /**
     * Get webSite
     *
     * @return string
     */
    public function getWebSite()
    {
        return $this->webSite;
    }

    /**
     * Set gender
     *
     * @param \CustomerBundle\Entity\ReferenceGender $gender
     *
     * @return MoralCustomer
     */
    public function setGender(\CustomerBundle\Entity\ReferenceGender $gender = null)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return \CustomerBundle\Entity\ReferenceGender
     */
    public function getGender()
    {
        return $this->gender;
    }
}
