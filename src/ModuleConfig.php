<?php

namespace Reliv\CacheRat;

use Reliv\CacheRat\Api\ClearAllCaches;
use Reliv\CacheRat\Api\ClearAllCachesBasicFactory;
use Reliv\CacheRat\Service\Cache;
use Reliv\CacheRat\Service\CacheArray;
use Reliv\CacheRat\Service\CacheArrayFactory;
use Reliv\CacheRat\Service\CacheFilePhp;
use Reliv\CacheRat\Service\CacheFilePhpFactory;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfig
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => [
                'config_factories' => [
                    /**
                     * Api ===========================================
                     */
                    ClearAllCaches::class => [
                        // OVER-RIDE ME
                        'factory' => ClearAllCachesBasicFactory::class,
                    ],
                    /**
                     * Service ===========================================
                     */
                    Cache::class => [
                        // OVER-RIDE ME
                        'factory' => CacheArrayFactory::class,
                    ],
                    CacheArray::class => [
                        'factory' => CacheArrayFactory::class,
                    ],
                    CacheFilePhp::class => [
                        'factory' => CacheFilePhpFactory::class,
                    ]
                ],
            ],
        ];
    }
}
