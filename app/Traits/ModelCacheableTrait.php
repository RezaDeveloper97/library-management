<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

trait ModelCacheableTrait
{
    public function cacheDataWithTags($key, $data, array $tags, $ttl = 3600): void
    {
        Cache::tags($tags)->put($key, $data, $ttl);
    }

    public function getFromCache($key, array $tags)
    {
        return Cache::tags($tags)->get($key);
    }

    public function clearCacheByTags(array $tags): void
    {
        Cache::tags($tags)->flush();
    }

    public function cacheData(): void
    {
        $key = $this->getCacheKey();
        $tags = $this->getCacheTags();
        $data = $this->toArray();

        $this->cacheDataWithTags($key, $data, $tags);
    }

    public function clearCache(): void
    {
        $tags = $this->getCacheTags();

        $this->clearCacheByTags($tags);
    }

    protected function getCacheKey(): string
    {
        return strtolower(class_basename($this)) . "_{$this->id}";
    }

    protected function getCacheTags(): array
    {
        $modelPlural = Str::plural(strtolower(class_basename($this)));
        $modelSingle = $this->getCacheKey();

        return [$modelPlural, $modelSingle];
    }
}
