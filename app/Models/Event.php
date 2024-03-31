<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id', 'title', 'description', 'target_fund', 'sponsor_deadline', 'event_start_date', 'event_end_date', 'event_venue', 'address', 'city', 'province', 'target_participants', 'participant_description', 'status_event', 'type_event'
    ];

    public function organizer()
    {
        return $this->belongsTo(Organization::class);
    }

    public function eventPhotos()
    {
        return $this->hasMany(EventPhoto::class);
    }

    

}
