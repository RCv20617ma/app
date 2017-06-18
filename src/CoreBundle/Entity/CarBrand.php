<?php

namespace CoreBundle\Entity;

use CoreBundle\Entity\MappedSuperClass\AbstractReference;
use CoreBundle\Entity\Traits\AgencyTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarBrand
 *
 * @ORM\Table(name="car_brand")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\CarBrandRepository")
 */
class CarBrand extends AbstractReference
{
    use AgencyTrait;
}
