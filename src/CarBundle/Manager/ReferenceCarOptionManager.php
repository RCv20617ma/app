<?php
namespace CarBundle\Manager;

use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\ReferenceCarOption;

/**
 * Class ReferenceCarOptionManager
 * @package CarBundle\Manager
 */
class ReferenceCarOptionManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return ReferenceCarOption::class;
    }

}