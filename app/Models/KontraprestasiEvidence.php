<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontraprestasiEvidence extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsor_id', 'photo_file', 'description'
    ];
}
