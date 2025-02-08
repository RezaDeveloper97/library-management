<?php

namespace App\Models;

use app\Enums\EReservationStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends BaseModel
{
    protected $fillable = [
        'user_id',
        'book_id',
        'edition_id',
        'branch_id',
        'status',
        'reserved_at',
        'due_date',
        'returned_at',
    ];

    protected $casts = [
        'reserved_at' => 'datetime',
        'due_date' => 'datetime',
        'returned_at' => 'datetime',
        'status'=> EReservationStatus::class
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
