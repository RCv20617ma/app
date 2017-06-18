<?php
namespace CoreBundle\Entity\Traits;

use CoreBundle\Entity\Agency;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AgencyTrait
 * @package CoreBundle\Entity\Traits
 */
trait AgencyTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Agency")
     * @ORM\JoinColumn(name="agency_id", referencedColumnName="id", nullable=false)
     **/
    protected $agency;

    /**
     * @return Agency
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @param Agency $agency
     * @return $this
     */
    public function setAgency(Agency $agency)
    {
        $this->agency = $agency;

        return $this;
    }


}