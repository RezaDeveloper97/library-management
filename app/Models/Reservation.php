<?php

namespace App\Models;

use app\Enums\EReservationStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends BaseModel
{
    protected $fillable = [
        'user_id',
        'book_stock_id',
        'status',
        'due_date',
        'returned_at',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'returned_at' => 'datetime',
        'status'=> EReservationStatus::class
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
