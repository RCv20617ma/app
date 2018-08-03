<?php
namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Agency;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AgencyTrait
 * @package AppBundle\Entity\Traits
 */
trait AgencyTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Agency")
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