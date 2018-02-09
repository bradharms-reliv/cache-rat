<?php

namespace Reliv\CacheRat\Api;

use Psr\Container\ContainerInterface;

/**
 * @author James Jervis - https://github.com/jerv13
 */
class ClearAllCachesBasic implements ClearAllCaches
{
    protected $serviceContainer;
    protected $zrcmsCachesConfig;

    /**
     * @param ContainerInterface $serviceContainer
     * @param array              $zrcmsCachesConfig
     */
    public function __construct(
        $serviceContainer,
        array $zrcmsCachesConfig
    ) {
        $this->serviceContainer = $serviceContainer;
        $this->zrcmsCachesConfig = $zrcmsCachesConfig;
    }

    /**
     * @param array $options
     *
     * @return bool
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(array $options = []): bool
    {
        $caches = (array)$this->getOption(
            $options,
            self::OPTION_ONLY_CACHES,
            $this->zrcmsCachesConfig
        );

        $skipCaches = (array)$this->getOption(
            $options,
            self::OPTION_SKIP_CACHES,
            []
        );

        $allCleared = true;
        /** @var string $cacheServiceName */
        foreach ($caches as $cacheServiceName) {
            if (in_array($cacheServiceName, $skipCaches)) {
                continue;
            }
            $cache = $this->serviceContainer->get($cacheServiceName);
            if (!$cache->clear()) {
                $allCleared = false;
            }
        }

        return $allCleared;
    }

    /**
     * @param array  $options
     * @param string $key
     * @param null   $default
     *
     * @return mixed|null
     */
    protected function getOption(
        array $options,
        string $key,
        $default = null
    ) {
        if (array_key_exists($key, $options)) {
            return $options[$key];
        }

        return $default;
    }
}
