<?php

namespace CoreBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

use CoreBundle\DependencyInjection\Compiler\DoctrineEntityListenerPass;

class CoreBundle extends Bundle
{

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container) {
        parent::build($container);

        $container->addCompilerPass(new DoctrineEntityListenerPass());
    }
}
