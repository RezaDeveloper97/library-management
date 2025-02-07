<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookEdition extends BaseModel
{
    protected $fillable = [
        'book_id',
        'publisher_id',
        'edition_year',
    ];

    protected $casts = [
        'edition_year' => 'datetime',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }
}
