<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenaltyLog extends BaseModel
{
    protected $fillable = [
        'user_id',
        'reservation_id',
        'penalty_reason',
        'penalty_amount',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}
