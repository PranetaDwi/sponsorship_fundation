<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPlacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'event_start_date', 'event_end_date', 'event_venue', 'address', 'city', 'province'
    ];
}
