<?php

namespace App\Traits;

use App\Helpers\CacheHelper;
use Illuminate\Support\Str;

trait ModelCacheableTrait
{
    public function getCacheData()
    {
        $key = $this->getCacheKey();
        $tags = $this->getCacheTags();
        return CacheHelper::getFromCache($key, $tags);
    }

    public function setCacheData(): void
    {
        $key = $this->getCacheKey();
        $tags = $this->getCacheTags();

        CacheHelper::cacheDataWithTags($key, $this, $tags);
    }

    public function clearCache(): void
    {
        $tags = $this->getCacheTags();

        CacheHelper::clearCacheByTags($tags);
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
