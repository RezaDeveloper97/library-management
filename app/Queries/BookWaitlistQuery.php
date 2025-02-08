<?php

namespace App\Queries;

use App\Models\BookWaitlist;

class BookWaitlistQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = BookWaitlist::query()->find($id);

        $cachedData = $model->getCacheData();

        if ($cachedData) return $cachedData;

        $model->setCacheData();

        return $model;
    }

    public function getAll()
    {
        return BookWaitlist::all();
    }
}
