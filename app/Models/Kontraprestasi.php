<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontraprestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id', 'min_sponsor', 'max_sponsor', 'feedback'
    ];
}
