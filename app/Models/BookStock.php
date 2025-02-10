<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookStock extends BaseModel
{
    protected $fillable = [
        'book_id',
        'edition_id',
        'branch_id',
        'total_copies',
        'reserved_copies',
        'lock_version',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function edition(): BelongsTo
    {
        return $this->belongsTo(BookEdition::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
