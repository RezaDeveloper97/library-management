<?php

namespace App\Models;

class EventSourcingStore extends BaseModel
{
    protected $fillable = [
        'event_type',
        'sourceable_type',
        'sourceable_id',
        'event_data',
    ];

    public function sourceable()
    {
        return $this->morphTo();
    }
}
