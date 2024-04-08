<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'entrepreneur_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
