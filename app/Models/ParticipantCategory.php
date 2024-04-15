<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantCategory extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'name'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
