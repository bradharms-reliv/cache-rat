<?php

namespace Reliv\CacheRat;

use Reliv\CacheRat\Service\Cache;
use Reliv\CacheRat\Service\CacheArray;
use Reliv\CacheRat\Service\CacheFilePhp;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ModuleConfigAllCaches
{
    /**
     * @return array
     */
    public function __invoke()
    {
        return [
            /** Register caches so global clears can be applied */
            'cache-rat-caches' => [
                Cache::class => Cache::class,
                CacheArray::class => CacheArray::class,
                CacheFilePhp::class => CacheFilePhp::class,
            ],
        ];
    }
}
