<?php

namespace App\Models;

use App\Enums\EReservationQueueStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReservationQueue extends BaseModel
{
    protected $fillable = [
        'user_id',
        'book_stock_id',
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

    public function bookStock(): BelongsTo
    {
        return $this->belongsTo(BookStock::class);
    }
}
