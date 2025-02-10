<?php

namespace App\Models;

use App\Enums\EUserNotificationStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserNotification extends BaseModel
{
    protected $fillable = [
        'id',
        'user_id',
        'status',
        'send_at',
    ];

    protected $casts = [
        'status' => EUserNotificationStatus::class,
        'send_at' => 'datetime',
        'receive_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
