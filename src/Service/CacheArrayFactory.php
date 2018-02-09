<?php

namespace Reliv\CacheRat\Service;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class CacheArrayFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return CacheArray
     */
    public function __invoke(ContainerInterface $serviceContainer)
    {
        return new CacheArray();
    }
}
