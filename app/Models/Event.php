<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id', 'title', 'description','target_participants', 'participant_description', 'status_event', 'type_event'
    ];

    public function organizer()
    {
        return $this->belongsTo(Organization::class);
    }

    public function eventPhotos()
    {
        return $this->hasMany(EventPhoto::class, 'event_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(EventCategoryName::class, 'event_categories');
    }

    public function eventFund(){
        return $this->hasOne(EventFund::class, 'event_id', 'id');
    }

    public function eventPlacement(){
        return $this->hasOne(EventPlacement::class, 'event_id', 'id');
    }

    public function kotraprestasi(){
        return $this->hasOne(Kontraprestasi::class, 'event_id', 'id');
    }

    public function sponsors(){
        return $this->hasMany(Sponsor::class, 'event_id', 'id');
    }

}
