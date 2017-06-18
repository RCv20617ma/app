<?php
namespace CoreBundle\Entity\Traits;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CodeStrTrait
 * @package CoreBundle\Entity\Traits
 */
trait CodeStrTrait
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=16, nullable=true)
     */
    private $code;

    /**
     * Set code
     *
     * @param string $code
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
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}