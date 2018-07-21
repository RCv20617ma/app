<?php
namespace AppBundle\Entity\Traits;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CodeIntTrait
 * @package AppBundle\Entity\Traits
 */
trait CodeIntTrait
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="integer", length=2, nullable=true)
     */
    private $code;
    /**
     * Set code
     *
     * @param integer $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }
    /**
     * Get code
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }
}