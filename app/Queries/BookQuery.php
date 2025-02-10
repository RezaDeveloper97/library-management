<?php

namespace App\Queries;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = Book::query()->find($id);

        return $this->getModelData($model);
    }

    public function getAll()
    {
        return Book::all();
    }

    public function searchByTitle(string $title): Collection
    {
        return Book::query()->where('title', 'like', '%' . $title . '%')->get();
    }
}
