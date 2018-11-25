<?php

namespace AppBundle\Service;


class Calculator
{

    function calculator($entity)
    {
        $totalOptions = 100;
        $avance =0;         
        $originalPriceDay =100;
        $price = $entity->getPriceDay()*$entity->getNumberDays();
        $total = $price+$totalOptions;
            
        $entity->setTotalOptions($totalOptions);
        $entity->setOriginalPriceDay($originalPriceDay);
        $entity->setTotal($total);
    }
}
