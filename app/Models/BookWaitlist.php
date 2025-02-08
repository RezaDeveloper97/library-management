<?php

namespace App\Models;

use app\Enums\EBookWaitlistStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookWaitlist extends BaseModel
{
    protected $fillable = [
        'user_id',
        'book_id',
        'edition_id',
        'branch_id',
        'status',
    ];

    protected $casts = [
        'status'=> EBookWaitlistStatus::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

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
