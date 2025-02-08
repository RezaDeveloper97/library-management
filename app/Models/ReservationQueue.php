<?php

namespace App\Models;

use App\Enums\EReservationQueueStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservationQueue extends BaseModel
{
    protected $fillable = [
        'user_id',
        'book_id',
        'edition_id',
        'branch_id',
        'priority',
        'status',
    ];

    protected $casts = [
        'status'=> EReservationQueueStatus::class
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
