<?php

namespace CoreBundle\Entity;

interface EntityCrudInterface
{
    /**
     * @return string
     */
    public function getFormType();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return string
     */
    public function getEntityManager();

    /**
     * @return string
     */
    public function getPreFixView();
}
