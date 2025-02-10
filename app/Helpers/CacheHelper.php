<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    public static function cacheDataWithTags(array $tags, string $key, $data, int $ttl = 3600): void
    {
        Cache::tags($tags)->put($key, $data, $ttl);
    }

    public static function getFromCache(array $tags, string $key)
    {
        return Cache::tags($tags)->get($key);
    }

    public static function clearCacheByTags(array $tags): void
    {
        Cache::tags($tags)->flush();
    }

    public static function cacheRemember(array $tags, string $key, \Closure $closure, int $ttl = 3600)
    {
        return Cache::tags($tags)->remember($key, $ttl, $closure);
    }
}
