<?php

namespace AppBundle\Doctrine;

use Doctrine\ORM\Mapping\DefaultEntityListenerResolver;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class EntityListenerResolver
 * @package AppBundle\Doctrine
 */
class EntityListenerResolver extends DefaultEntityListenerResolver
{
    /**
     * @var ContainerInterface $container
     */
    private $container;
    /**
     * @var array
     */
    private $mapping;

    /**
     * EntityListenerResolver constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->mapping = [];
    }

    /**
     * @param string $className
     * @param mixed  $service
     */
    public function addMapping($className, $service)
    {
        $this->mapping[$className] = $service;
    }

    /**
     * @param string $className
     * @return mixed|object
     */
    public function resolve($className)
    {
        if (isset($this->mapping[$className]) && $this->container->has($this->mapping[$className])) {
            return $this->container->get($this->mapping[$className]);
        }

        return parent::resolve($className);
    }
}
