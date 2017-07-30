<?php

namespace CoreBundle\Entity\Traits;

use AppBundle\Entity\User;

/**
 * Class UpdatedByTrait
 * @package CoreBundle\Entity\Traits
 */
trait UpdatedByTrait
{
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="updated_by_id", referencedColumnName="id", nullable=true)
     */
    private $updatedBy;

    /**
     * @return User
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * @param User $updatedBy
     * @return $this
     */
    public function setUpdatedBy(User $updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }
}