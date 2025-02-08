<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    public static function cacheDataWithTags($key, $data, array $tags, $ttl = 3600): void
    {
        Cache::tags($tags)->put($key, $data, $ttl);
    }

    public static function getFromCache($key, array $tags)
    {
        return Cache::tags($tags)->get($key);
    }

    public static function clearCacheByTags(array $tags): void
    {
        Cache::tags($tags)->flush();
    }
}
