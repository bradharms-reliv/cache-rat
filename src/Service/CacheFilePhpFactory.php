<?php

namespace Reliv\CacheRat\Service;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class CacheFilePhpFactory
{
    /**
     * @param ContainerInterface $serviceContainer
     *
     * @return CacheFilePhp
     */
    public function __invoke(ContainerInterface $serviceContainer)
    {
        return new CacheFilePhp(
            __DIR__ . '/../../../../../data/cache/cache-rat.php'
        );
    }
}
