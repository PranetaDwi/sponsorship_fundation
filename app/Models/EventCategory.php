<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'event_category_name_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
    public function eventCategoryName()
    {
        return $this->belongsTo(EventCategoryName::class);
    }
}
