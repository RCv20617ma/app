<?php
namespace CarBundle\Manager;

use AppBundle\Entity\User;
use CoreBundle\Entity\Agency;
use CoreBundle\Manager\AbstractManager;
use CarBundle\Entity\Car;

/**
 * Class CarManager
 * @package CarBundle\Manager
 */
class CarManager extends AbstractManager
{
    /**
     * @return mixed
     */
    public function getClass()
    {
        return Car::class;
    }

    /**
     * @param Agency $agency
     * @param null $key
     * @param bool $getResult
     * @return mixed
     */
    public function getAllByAgency(Agency $agency,$key = null,$getResult = true) {
        return $this->getRepository()->findAllByAgency($agency,$key,$getResult);
    }

    /**
     * @param User $user
     * @return Car
     */
    public function createByUser(User $user){
        /**
         * @var $car Car
         */
        $car = parent::create();

        $car->setAgency($user->getAgency());
        return $car;
    }

}