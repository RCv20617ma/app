<?php
namespace CarBundle\Manager;

use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\ReferenceGearBox;

/**
 * Class ReferenceGearBoxManager
 * @package CarBundle\Manager
 */
class ReferenceGearBoxManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return ReferenceGearBox::class;
    }
    
}