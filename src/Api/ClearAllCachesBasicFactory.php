<?php

namespace Reliv\CacheRat\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ClearAllCachesBasicFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return ClearAllCachesBasic
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $serviceContainer)
    {
        $appConfig = $serviceContainer->get('config');

        return new ClearAllCachesBasic(
            $serviceContainer,
            $appConfig['cache-rat-caches']
        );
    }
}
