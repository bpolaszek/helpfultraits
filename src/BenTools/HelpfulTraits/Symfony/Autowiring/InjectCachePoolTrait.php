<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Psr\Cache\CacheItemPoolInterface;

trait InjectCachePoolTrait
{

    /**
     * @var CacheItemPoolInterface
     */
    protected $cachePool;

    /**
     * @param CacheItemPoolInterface $cachePool
     * @required
     */
    public function setCachePool(CacheItemPoolInterface $cachePool): void
    {
        $this->cachePool = $cachePool;
    }
}
