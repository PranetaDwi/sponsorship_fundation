<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'amount', 'entrepreneur_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function entrepreneur()
    {
        return $this->belongsTo(Entrepreneur::class, 'entrepreneur_id', 'id');
    }
}
