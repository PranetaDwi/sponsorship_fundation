<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrepreneur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mitra_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
