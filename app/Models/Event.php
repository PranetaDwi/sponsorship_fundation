<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id', 'title', 'description', 'target_fund', 'donation_deadline', 'event_date', 'event_venue', 'city', 'province'
    ];

    public function organizer()
    {
        return $this->belongsTo(Organization::class);
    }

}
