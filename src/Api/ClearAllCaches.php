<?php

namespace Reliv\CacheRat\Api;

/**
 * @author James Jervis - https://github.com/jerv13
 */
interface ClearAllCaches
{
    const OPTION_ONLY_CACHES = 'only-caches';
    const OPTION_SKIP_CACHES = 'skip-caches';

    /**
     * @param array $options
     *
     * @return bool
     */
    public function __invoke(array $options = []): bool;
}
