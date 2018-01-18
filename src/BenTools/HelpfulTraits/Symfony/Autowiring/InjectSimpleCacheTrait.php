<?php

namespace BenTools\HelpfulTraits\Symfony\Autowiring;

use Psr\SimpleCache\CacheInterface;

trait InjectSimpleCacheTrait
{

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * @param CacheInterface $cache
     * @required
     */
    public function setCache(CacheInterface $cache): void
    {
        $this->cache = $cache;
    }
}
