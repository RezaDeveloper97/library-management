<?php

namespace App\Models;

class EventSourcingStore extends BaseModel
{
    const UPDATED_AT = null;
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

    public function getEventDataAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setEventDataAttribute($value): void
    {
        $this->attributes['event_data'] = json_encode($value);
    }
}
