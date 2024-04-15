<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFund extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'target_fund', 'sponsor_deadline'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
