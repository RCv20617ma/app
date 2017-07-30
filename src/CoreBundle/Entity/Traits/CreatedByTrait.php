<?php

namespace CoreBundle\Entity\Traits;

use AppBundle\Entity\User;

/**
 * Class CreatedByTrait
 * @package CoreBundle\Entity\Traits
 */
trait CreatedByTrait
{
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="created_by_id", referencedColumnName="id", nullable=true)
     */
    private $createdBy;

    /**
     * @return User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param User $createdBy
     * @return $this
     */
    public function setCreatedBy(User $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }
}