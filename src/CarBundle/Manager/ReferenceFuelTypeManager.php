<?php
namespace CarBundle\Manager;

use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\ReferenceFuelType;

/**
 * Class ReferenceFuelTypeManager
 * @package CarBundle\Manager
 */
class ReferenceFuelTypeManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return ReferenceFuelType::class;
    }
    
}