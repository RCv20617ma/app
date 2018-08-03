<?php

namespace AppBundle\Entity;

interface EntityCrudInterface
{
    /**
     * @return string
     */
    public function getFormTypeClassName();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return string
     */
    public function getEntityManagerClassName();

    /**
     * @return string
     */
    public function getPreFixView();
}
