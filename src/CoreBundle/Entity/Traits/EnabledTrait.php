<?php
namespace CoreBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class EnabledTrait
 * @package CoreBundle\Entity\Traits
 */
trait EnabledTrait
{
    /**
     * @var boolean
     * @ORM\Column(name="enabled", type="boolean", options={"default":true})
     */
    private $enabled;

    /**
     * Get Enabled
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set Enabled
     *
     * @param boolean $enabled
     * @return $this
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }
}