<?php

namespace App\Models;

use app\Enums\EReservationStatus;

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
}
