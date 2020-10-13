<?php

namespace Db\Cache\Doctrine;

use Doctrine\Common\Cache\RedisCache;
use Interop\Container\ContainerInterface;
use Redis;

final class RedisCacheFactory
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        $config = $container->get('config');
        $cache = new RedisCache();

        $redis = new Redis();
        $redis->connect($config['redis']['db']['server'], $config['redis']['db']['port']);

        $cache->setRedis($redis);

        return $cache;
    }
}
